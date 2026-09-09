<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Additive schema for the rewritten blog module.
 *
 * Deliberately extends `blogs` rather than introducing a `posts` table: 1,040
 * live rows, 1,527 blog_categories, 21 blog_tags and blog_comments all key off
 * blogs.id, and six front-end views plus /blog/{id}/{title} URLs already
 * indexed by search engines read it. A parallel table would mean rewriting all
 * of that with no functional gain.
 *
 * The misspelled `contant` column is NOT renamed -- it is read in 20+ places.
 * App\Blog exposes a `content` accessor/mutator over it instead.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Editable, SEO-facing URL segment. Nullable so the backfill below
            // can populate it before the unique index is relied upon.
            if (! Schema::hasColumn('blogs', 'slug')) {
                $table->string('slug', 255)->nullable()->after('title');
            }
            // Scheduling: NULL means "fall back to created_at" for legacy rows.
            if (! Schema::hasColumn('blogs', 'published_at')) {
                $table->timestamp('published_at')->nullable()->after('status');
            }
            if (! Schema::hasColumn('blogs', 'canonical_url')) {
                $table->string('canonical_url', 255)->nullable()->after('meta_title');
            }
            if (! Schema::hasColumn('blogs', 'og_image')) {
                $table->string('og_image', 255)->nullable()->after('info_graphic');
            }
            if (! Schema::hasColumn('blogs', 'focus_keyword')) {
                $table->string('focus_keyword', 255)->nullable()->after('meta_keyword');
            }
        });

        // `contant` is TEXT (64KB). WordPress-style posts with long HTML or an
        // embedded data: URI silently truncate mid-save at that ceiling.
        DB::statement('ALTER TABLE `blogs` MODIFY `contant` LONGTEXT NULL');

        $this->backfillSlugs();

        // Only add the unique index once every row has a value, otherwise the
        // 24 duplicate titles in this table would collide.
        $hasIndex = collect(DB::select("SHOW INDEX FROM `blogs` WHERE Key_name = 'blogs_slug_unique'"))->isNotEmpty();
        if (! $hasIndex) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->unique('slug', 'blogs_slug_unique');
            });
        }

        // Legacy rows have no published_at; treat their created_at as the
        // publish date so ordering and sitemap dates stay correct.
        DB::statement('UPDATE `blogs` SET `published_at` = `created_at` WHERE `published_at` IS NULL AND `status` = 1');
    }

    /**
     * Give every existing row a unique slug derived from its title.
     * 1,040 rows hold only 1,016 distinct titles, so collisions get -2, -3, ...
     */
    private function backfillSlugs(): void
    {
        $taken = DB::table('blogs')->whereNotNull('slug')->pluck('slug')->all();
        $taken = array_flip($taken);

        DB::table('blogs')->select('id', 'title', 'slug')->orderBy('id')
            ->chunkById(200, function ($rows) use (&$taken) {
                foreach ($rows as $row) {
                    if (! empty($row->slug)) {
                        continue;
                    }
                    $base = \Illuminate\Support\Str::slug((string) $row->title);
                    if ($base === '') {
                        $base = 'post-' . $row->id;
                    }
                    $base = mb_substr($base, 0, 240);

                    $slug = $base;
                    $n = 1;
                    while (isset($taken[$slug])) {
                        $n++;
                        $slug = $base . '-' . $n;
                    }
                    $taken[$slug] = true;

                    DB::table('blogs')->where('id', $row->id)->update(['slug' => $slug]);
                }
            });
    }

    public function down(): void
    {
        $hasIndex = collect(DB::select("SHOW INDEX FROM `blogs` WHERE Key_name = 'blogs_slug_unique'"))->isNotEmpty();
        if ($hasIndex) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->dropUnique('blogs_slug_unique');
            });
        }
        Schema::table('blogs', function (Blueprint $table) {
            foreach (['slug', 'published_at', 'canonical_url', 'og_image', 'focus_keyword'] as $col) {
                if (Schema::hasColumn('blogs', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
