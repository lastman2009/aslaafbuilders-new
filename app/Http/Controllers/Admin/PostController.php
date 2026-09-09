<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Category;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

/**
 * The rewritten blog module (WordPress-style posting screen).
 *
 * Writes to the same `blogs` table the legacy BlogController uses, so the six
 * existing front-end views keep working unchanged. The legacy controller is
 * left in place; this one lives under /admin/posts.
 *
 * Column semantics preserved from the legacy schema:
 *   status     0 = trashed, 1 = published, 2 = draft
 *   identifier 0 = blog, 1 = news   (which front-end section it appears in)
 *   contant    the body column (misspelled upstream)
 */
class PostController extends Controller
{
    /** Featured image box. The source ratio is kept -- see resizeToWidth(). */
    private const FEATURED_WIDTH = 1200;
    private const THUMB_WIDTH    = 400;

    public function index(Request $request)
    {
        $status = $request->input('status', 'all');
        $type   = $request->input('type', 'all');
        $search = trim((string) $request->input('q', ''));

        $posts = Blog::query()
            ->when($status !== 'all', function ($q) use ($status) {
                $map = [
                    'published' => Blog::STATUS_PUBLISHED,
                    'draft'     => Blog::STATUS_DRAFT,
                    'trashed'   => Blog::STATUS_TRASHED,
                ];
                if (isset($map[$status])) {
                    $q->where('status', $map[$status]);
                }
            })
            ->when($status === 'all', fn ($q) => $q->where('status', '!=', Blog::STATUS_TRASHED))
            ->when($type !== 'all', function ($q) use ($type) {
                $q->where('identifier', $type === 'news' ? Blog::TYPE_NEWS : Blog::TYPE_BLOG);
            })
            ->when($search !== '', function ($q) use ($search) {
                $q->where(function ($w) use ($search) {
                    $w->where('title', 'like', "%{$search}%")
                      ->orWhere('slug', 'like', "%{$search}%")
                      ->orWhere('contant', 'like', "%{$search}%");
                });
            })
            ->withCount('comments')
            ->orderByDesc('id')
            ->paginate(20)
            ->withQueryString();

        $counts = [
            'all'       => Blog::where('status', '!=', Blog::STATUS_TRASHED)->count(),
            'published' => Blog::where('status', Blog::STATUS_PUBLISHED)->count(),
            'draft'     => Blog::where('status', Blog::STATUS_DRAFT)->count(),
            'trashed'   => Blog::where('status', Blog::STATUS_TRASHED)->count(),
        ];

        return view('admin.posts.index', compact('posts', 'counts', 'status', 'type', 'search'));
    }

    public function create()
    {
        $post = new Blog([
            'identifier' => Blog::TYPE_BLOG,
            'status'     => Blog::STATUS_DRAFT,
        ]);

        return view('admin.posts.form', [
            'post'          => $post,
            'categories'    => Category::where('status', 1)->orderBy('title')->get(),
            'tags'          => Tag::where('status', 1)->orderBy('title')->get(),
            'selectedCats'  => [],
            'selectedTags'  => [],
            'isEdit'        => false,
        ]);
    }

    public function edit($id)
    {
        $post = Blog::findOrFail($id);

        return view('admin.posts.form', [
            'post'          => $post,
            'categories'    => Category::where('status', 1)->orderBy('title')->get(),
            'tags'          => Tag::where('status', 1)->orderBy('title')->get(),
            'selectedCats'  => $post->categories->pluck('id')->all(),
            'selectedTags'  => $post->tags->pluck('id')->all(),
            'isEdit'        => true,
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $post = new Blog();

        DB::transaction(function () use ($request, $data, &$post) {
            $this->fill($post, $request, $data);
            $post->save();
            $this->syncTaxonomies($post, $request);
        });

        return redirect()
            ->route('admin.posts.edit', $post->id)
            ->with('status', 'Post saved.');
    }

    public function update(Request $request, $id)
    {
        $post = Blog::findOrFail($id);
        $data = $this->validated($request, $post->id);

        DB::transaction(function () use ($request, $data, $post) {
            $this->fill($post, $request, $data);
            $post->save();
            $this->syncTaxonomies($post, $request);
        });

        return redirect()
            ->route('admin.posts.edit', $post->id)
            ->with('status', 'Post updated.');
    }

    /** Soft delete: status 0 is the legacy "trash" state, nothing is removed. */
    public function trash($id)
    {
        $post = Blog::findOrFail($id);
        $post->status = Blog::STATUS_TRASHED;
        $post->save();

        return back()->with('status', 'Post moved to trash.');
    }

    public function restore($id)
    {
        $post = Blog::findOrFail($id);
        $post->status = Blog::STATUS_DRAFT;
        $post->save();

        return back()->with('status', 'Post restored as draft.');
    }

    /* ---------------------------------------------------------------------
     | Internals
     | ------------------------------------------------------------------ */

    private function validated(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'title'            => ['required', 'string', 'max:255'],
            // Slugs are URL-facing and unique; blank is allowed and derived
            // from the title in fill().
            'slug'             => [
                'nullable', 'string', 'max:240',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                Rule::unique('blogs', 'slug')->ignore($ignoreId),
            ],
            'contant'          => ['required', 'string'],
            'author_name'      => ['nullable', 'string', 'max:255'],
            'identifier'       => ['required', 'in:0,1'],
            'status'           => ['required', 'in:0,1,2'],
            'published_at'     => ['nullable', 'date'],
            'meta_title'       => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:320'],
            'meta_keyword'     => ['nullable', 'string', 'max:255'],
            'focus_keyword'    => ['nullable', 'string', 'max:255'],
            'canonical_url'    => ['nullable', 'url', 'max:255'],
            'og_image'         => ['nullable', 'string', 'max:255'],
            'category_id'      => ['nullable', 'array'],
            'category_id.*'    => ['integer', 'exists:categories,id'],
            'tags_ids'         => ['nullable', 'array'],
            'tags_ids.*'       => ['integer', 'exists:tags,id'],
            'new_tags'         => ['nullable', 'string', 'max:500'],
            // Featured image is optional on edit (an existing one is kept).
            'photo'            => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:8192'],
            'info_graphic'     => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:8192'],
        ], [
            'slug.regex' => 'The URL slug may only contain lowercase letters, numbers and single hyphens.',
        ]);
    }

    private function fill(Blog $post, Request $request, array $data): void
    {
        $post->title       = trim($data['title']);
        $post->slug        = Blog::uniqueSlug(
            $data['slug'] !== null && $data['slug'] !== '' ? $data['slug'] : $data['title'],
            $post->exists ? $post->id : null
        );
        $post->contant     = $data['contant'];
        $post->author_name = $data['author_name'] ?? null;
        $post->identifier  = (int) $data['identifier'];
        $post->status      = (int) $data['status'];

        $post->meta_title       = $data['meta_title'] ?? null;
        $post->meta_description = $data['meta_description'] ?? null;
        $post->meta_keyword     = $data['meta_keyword'] ?? null;
        $post->focus_keyword    = $data['focus_keyword'] ?? null;
        $post->canonical_url    = $data['canonical_url'] ?? null;
        $post->og_image         = $data['og_image'] ?? null;

        // Publishing a post with no explicit date stamps it now, so scheduling
        // and the sitemap have something real to sort on.
        if ($post->status === Blog::STATUS_PUBLISHED) {
            $post->published_at = ! empty($data['published_at'])
                ? $data['published_at']
                : ($post->published_at ?: now());
        } else {
            $post->published_at = $data['published_at'] ?? null;
        }

        if ($request->hasFile('photo')) {
            $post->gallery = $this->storeFeatured($request->file('photo'));
        }
        if ($request->hasFile('info_graphic')) {
            $post->info_graphic = $this->storeInfographic($request->file('info_graphic'));
        }
    }

    /**
     * Attach categories and tags, creating any free-typed tags on the way.
     * Uses the existing blog_categories / blog_tags pivots.
     */
    private function syncTaxonomies(Blog $post, Request $request): void
    {
        $catIds = array_values(array_unique(array_map('intval', (array) $request->input('category_id', []))));
        $post->categories()->sync($catIds);

        $tagIds = array_map('intval', (array) $request->input('tags_ids', []));

        // Comma-separated free text, WordPress-style. Reuse a tag when the
        // title already exists rather than creating duplicates.
        $typed = trim((string) $request->input('new_tags', ''));
        if ($typed !== '') {
            foreach (array_filter(array_map('trim', explode(',', $typed))) as $title) {
                $tag = Tag::whereRaw('LOWER(title) = ?', [mb_strtolower($title)])->first();
                if (! $tag) {
                    $tag = Tag::create(['title' => $title, 'description' => null]);
                    $tag->status = 1;
                    $tag->save();
                }
                $tagIds[] = (int) $tag->id;
            }
        }

        $post->tags()->sync(array_values(array_unique($tagIds)));
    }

    /**
     * Store the featured image at full width, preserving aspect ratio.
     *
     * Deliberately NOT Image::fit() -- fit() crops to hit an exact box and was
     * clipping the bottom of banner-style graphics. resize() with a null height
     * and the aspect-ratio constraint scales instead.
     */
    private function storeFeatured($file): string
    {
        $name = time() . '.' . $file->getClientOriginalExtension();
        $dir  = public_path('images/blogs_images');
        if (! is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }

        $img = Image::make($file);
        if ($img->width() > self::FEATURED_WIDTH) {
            $img->resize(self::FEATURED_WIDTH, null, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            });
        }
        $img->save($dir . '/' . $name);

        // Listing thumbnail, same ratio as the source so nothing is cropped.
        $thumb = Image::make($file)->resize(self::THUMB_WIDTH, null, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        });
        $thumb->save($dir . '/thumb_' . $name);

        return $name;
    }

    private function storeInfographic($file): string
    {
        $name = 'infographic' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/blogs_images'), $name);
        return $name;
    }

    /**
     * Image upload target for the content editor's picture button.
     *
     * Summernote's default picture button reads the file with FileReader and
     * embeds it as a base64 data: URI directly in the saved HTML -- there is
     * no separate "upload" step unless this callback exists. One inserted
     * photo can add several hundred KB of base64 text to `contant` (a single
     * post on this install reached ~390KB in `contant` this way), which is
     * heavy enough to make typing near it feel unresponsive since the browser
     * re-diffs that inline blob on every edit. Uploading the file here and
     * inserting a normal <img src="..."> keeps the saved HTML small.
     */
    public function uploadContentImage(Request $request)
    {
        $request->validate([
            'file' => ['required', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:8192'],
        ]);

        $file = $request->file('file');
        $name = 'content' . time() . '_' . mt_rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
        $dir  = public_path('images/blogs_images');
        if (! is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }

        $img = Image::make($file);
        if ($img->width() > self::FEATURED_WIDTH) {
            $img->resize(self::FEATURED_WIDTH, null, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            });
        }
        $img->save($dir . '/' . $name);

        return response()->json([
            'url' => asset('images/blogs_images/' . $name),
        ]);
    }

    /** Live slug availability check for the editor's URL field. */
    public function checkSlug(Request $request)
    {
        $slug = Str::slug((string) $request->input('slug', ''));
        $id   = $request->input('id');

        if ($slug === '') {
            return response()->json(['ok' => false, 'slug' => '', 'message' => 'Slug is empty.']);
        }

        $taken = Blog::where('slug', $slug)
            ->when($id, fn ($q) => $q->where('id', '!=', $id))
            ->exists();

        return response()->json([
            'ok'         => ! $taken,
            'slug'       => $slug,
            'suggestion' => $taken ? Blog::uniqueSlug($slug, $id ? (int) $id : null) : $slug,
            'message'    => $taken ? 'That slug is already in use.' : 'Available.',
        ]);
    }
}
