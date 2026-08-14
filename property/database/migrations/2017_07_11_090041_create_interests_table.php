<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('status')->default(1);
            
            $table->timestamps();
        });
         DB::table('interests')->insert(
            array(
                array('name' => 'Buying','status' => 1),
                array('name' => 'Selling','status' => 1),
                array('name' => 'Investment','status' => 1),
                array('name' => 'Construction','status' => 1),
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
        Schema::dropIfExists('interests');
    }
}
