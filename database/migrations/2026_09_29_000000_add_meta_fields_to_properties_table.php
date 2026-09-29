<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Optional per-listing SEO override fields, for both properties and
     * projects (a "project" is a Property row with purpose = 4, so this
     * one table covers both). Left empty, the existing generated
     * Property::seoTitle()/seoDescription() output is used unchanged.
     */
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            if (!Schema::hasColumn('properties', 'meta_title')) {
                $table->string('meta_title', 255)->nullable();
            }
            if (!Schema::hasColumn('properties', 'meta_description')) {
                $table->string('meta_description', 500)->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn(['meta_title', 'meta_description']);
        });
    }
};
