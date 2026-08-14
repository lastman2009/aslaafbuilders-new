<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schemes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id');
            $table->string('property_type_name')->nullable();
            $table->string('title')->nullable();
            $table->integer('area')->nullable();
            $table->integer('area_type')->nullable();
            $table->string('payment_method')->nullable();
            $table->integer('bath')->nullable();
            $table->integer('bed')->nullable();
            $table->integer('no_of_floor')->nullable();
            $table->integer('min_price')->nullable();
            $table->integer('max_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schemes');
    }
}
