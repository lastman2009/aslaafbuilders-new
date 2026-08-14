<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocietiesTable extends Migration
{
    public function up()
    {
        Schema::create('societies', function (Blueprint $table) {
            $table->id();
            $table->string('province');
            $table->string('city');
            $table->string('name');
            $table->string('slug')->unique();
            $table->tinyInteger('status')->default(1)->comment('1=active, 0=inactive');
            $table->timestamps();

            $table->index(['province', 'city']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('societies');
    }
}
