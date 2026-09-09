<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * A blog post (or news item -- see the $identifier constants).
 *
 * Column quirks inherited from the legacy schema, deliberately preserved
 * because 20+ call sites and six front-end views depend on them:
 *   - `contant` is the body column (misspelled). Use the `content` accessor
 *     in new code; both read and write the same column.
 *   - `status` is an int, not an enum: 0 = trashed, 1 = published,
 *     2 = unpublished/draft. The front end shows status = 1 only.
 *   - `identifier` splits the two sections: 0 = blog, 1 = news.
 */
class Blog extends Model
{
    /** status values */
    public const STATUS_TRASHED   = 0;
    public const STATUS_PUBLISHED = 1;
    public const STATUS_DRAFT     = 2;

    /** identifier values -- which front-end section the post belongs to */
    public const TYPE_BLOG = 0;
    public const TYPE_NEWS = 1;

    protected $fillable = [
        'title', 'slug', 'author_name', 'identifier', 'contant', 'comment',
        'meta_title', 'meta_description', 'meta_keyword', 'focus_keyword',
        'canonical_url', 'status', 'published_at', 'gallery', 'info_graphic',
        'og_image',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'status'       => 'integer',
        'identifier'   => 'integer',
        'view'         => 'integer',
    ];

    /* ---------------------------------------------------------------------
     | Body column alias
     | ------------------------------------------------------------------ */

    /** Read the misspelled `contant` column as `content`. */
    public function getContentAttribute(): ?string
    {
        return $this->attributes['contant'] ?? null;
    }

    /** Write `content` through to `contant`. */
    public function setContentAttribute($value): void
    {
        $this->attributes['contant'] = $value;
    }

    /* ---------------------------------------------------------------------
     | Relationships (against the existing pivot tables)
     | ------------------------------------------------------------------ */

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blog_categories', 'blog_id', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tags', 'blog_id', 'tag_id');
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class, 'blog_id');
    }

    /* ---------------------------------------------------------------------
     | Scopes
     | ------------------------------------------------------------------ */

    /** Live posts only: published, and not scheduled for the future. */
    public function scopePublished($query)
    {
        return $query->where('status', self::STATUS_PUBLISHED)
            ->where(function ($q) {
                $q->whereNull('published_at')->orWhere('published_at', '<=', now());
            });
    }

    public function scopeBlogs($query)
    {
        return $query->where('identifier', self::TYPE_BLOG);
    }

    public function scopeNews($query)
    {
        return $query->where('identifier', self::TYPE_NEWS);
    }

    /* ---------------------------------------------------------------------
     | URLs / SEO
     | ------------------------------------------------------------------ */

    /**
     * Canonical path for this post.
     *
     * Keeps the long-standing /blog/{id}/{slug} shape so every URL already
     * indexed by search engines still resolves -- the id is what actually
     * resolves the post, the slug segment is cosmetic and redirectable.
     */
    public function getUrlAttribute(): string
    {
        return '/blog/' . $this->id . '/' . $this->effective_slug;
    }

    /** Slug to use in URLs, falling back to the title for legacy rows. */
    public function getEffectiveSlugAttribute(): string
    {
        $slug = trim((string) $this->slug);
        return $slug !== '' ? $slug : Str::slug((string) $this->title);
    }

    /** Whatever should go in <title>. */
    public function getSeoTitleAttribute(): string
    {
        $t = trim((string) $this->meta_title);
        return $t !== '' ? $t : (string) $this->title;
    }

    /**
     * Meta description: the curated one if set, otherwise a trimmed excerpt
     * of the body so no post ships without a description.
     */
    public function getSeoDescriptionAttribute(): string
    {
        $d = trim((string) $this->meta_description);
        if ($d !== '') {
            return $d;
        }
        $plain = trim(preg_replace('/\s+/', ' ', strip_tags((string) $this->contant)));
        return Str::limit($plain, 155, '');
    }

    /** Absolute URL of the social/preview image, or '' when there is none. */
    public function getSocialImageAttribute(): string
    {
        foreach ([$this->og_image, $this->gallery] as $candidate) {
            $candidate = trim((string) $candidate);
            if ($candidate === '') {
                continue;
            }
            if (Str::startsWith($candidate, ['http://', 'https://'])) {
                return $candidate;
            }
            if (file_exists(public_path('images/blogs_images/' . $candidate))) {
                return asset('images/blogs_images/' . $candidate);
            }
        }
        return '';
    }

    /**
     * Build a slug that is unique across the table.
     * $ignoreId lets an existing post keep its own slug while editing.
     */
    public static function uniqueSlug(string $source, ?int $ignoreId = null): string
    {
        $base = Str::slug($source);
        if ($base === '') {
            $base = 'post';
        }
        $base = mb_substr($base, 0, 240);

        $slug = $base;
        $n = 1;
        while (static::where('slug', $slug)
            ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->exists()) {
            $n++;
            $slug = $base . '-' . $n;
        }
        return $slug;
    }
}
