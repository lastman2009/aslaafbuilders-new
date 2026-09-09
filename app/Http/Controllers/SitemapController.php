<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Response;

/**
 * XML sitemap for search engines, served at /sitemap.xml.
 *
 * Only published, non-future posts are listed, using the same
 * /blog/{id}/{slug} URL shape the site has always used so the sitemap agrees
 * with the canonical tags on the pages themselves.
 */
class SitemapController extends Controller
{
    public function index(): Response
    {
        $posts = Blog::published()
            ->select('id', 'title', 'slug', 'updated_at', 'published_at', 'identifier')
            ->orderByDesc('published_at')
            ->get();

        $categories = Category::where('status', 1)->select('id', 'title')->get();

        $urls = [];

        // Static entries first -- highest priority pages.
        $urls[] = ['loc' => url('/'), 'priority' => '1.0', 'changefreq' => 'daily'];
        $urls[] = ['loc' => url('/blog'), 'priority' => '0.9', 'changefreq' => 'daily'];

        foreach ($categories as $category) {
            $urls[] = [
                'loc'        => url('/blog-' . \Illuminate\Support\Str::slug($category->title) . '/' . $category->id),
                'priority'   => '0.6',
                'changefreq' => 'weekly',
            ];
        }

        foreach ($posts as $post) {
            $lastmod = $post->updated_at ?: $post->published_at;
            $urls[] = [
                'loc'        => url($post->url),
                'lastmod'    => $lastmod ? $lastmod->toAtomString() : null,
                'priority'   => '0.8',
                'changefreq' => 'monthly',
            ];
        }

        $xml = $this->render($urls);

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
        ]);
    }

    /** @param array<int,array<string,string|null>> $urls */
    private function render(array $urls): string
    {
        $lines = [];
        $lines[] = '<?xml version="1.0" encoding="UTF-8"?>';
        $lines[] = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($urls as $url) {
            $lines[] = '  <url>';
            $lines[] = '    <loc>' . htmlspecialchars($url['loc'], ENT_XML1 | ENT_QUOTES, 'UTF-8') . '</loc>';
            if (! empty($url['lastmod'])) {
                $lines[] = '    <lastmod>' . $url['lastmod'] . '</lastmod>';
            }
            if (! empty($url['changefreq'])) {
                $lines[] = '    <changefreq>' . $url['changefreq'] . '</changefreq>';
            }
            if (! empty($url['priority'])) {
                $lines[] = '    <priority>' . $url['priority'] . '</priority>';
            }
            $lines[] = '  </url>';
        }

        $lines[] = '</urlset>';

        return implode("\n", $lines) . "\n";
    }
}
