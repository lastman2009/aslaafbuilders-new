<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_positions', function (Blueprint $table) {
            $table->increments('id');
             $table->string('name')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
         DB::table('ad_positions')->insert(
            array(
                array('name' => 'Sidebar Top','status' => 1),
                array('name' => 'Sidebar Bottom','status' => 1),
                
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
        Schema::dropIfExists('ad_positions');
    }
}
