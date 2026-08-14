<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocietyBlocksTable extends Migration
{
    public function up()
    {
        Schema::create('society_blocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('society_id');
            $table->string('name');
            $table->tinyInteger('status')->default(1)->comment('1=active, 0=inactive');
            $table->timestamps();

            $table->foreign('society_id')->references('id')->on('societies')->cascadeOnDelete();
            $table->index('society_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('society_blocks');
    }
}
