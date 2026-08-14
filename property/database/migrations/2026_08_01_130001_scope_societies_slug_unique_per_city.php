<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ScopeSocietiesSlugUniquePerCity extends Migration
{
    public function up()
    {
        Schema::table('societies', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->unique(['city', 'slug']);
        });
    }

    public function down()
    {
        Schema::table('societies', function (Blueprint $table) {
            $table->dropUnique(['city', 'slug']);
            $table->unique('slug');
        });
    }
}
