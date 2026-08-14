<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_pages', function (Blueprint $table) {
            $table->increments('id');
             $table->string('name')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
        DB::table('ad_pages')->insert(
            array(
                array('name' => 'Home Page','status' => 1),
                array('name' => 'Listing Page','status' => 1),
                array('name' => 'Detail Page','status' => 1),
                array('name' => 'Detail Tab Page','status' => 1),
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ad_pages');
    }
}
