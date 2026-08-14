<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('parent')->default(0); 
            $table->integer('status')->nullable();
            $table->timestamps();
        });
          DB::table('property_types')->insert(
            array(
                array('name' => 'Residential','status' => 1,'parent' => 0),
                array('name' => 'Commercial','status' => 1,'parent' => 0),
                array('name' => 'Plots','status' => 1,'parent' => 0),
                array('name' => 'House/Villa','status' => 1,'parent' => 1),
                array('name' => 'Flats','status' => 1,'parent' => 1),
                array('name' => 'Upper Portion','status' => 1,'parent' => 1),
                array('name' => 'Lower Portion','status' => 1,'parent' => 1),
                array('name' => 'Farm Houses','status' => 1,'parent' => 1),
                array('name' => 'Lodges','status' => 1,'parent' => 1),
                array('name' => 'Pent Houses','status' => 1,'parent' => 1),
                array('name' => 'Rooms','status' => 1,'parent' => 1),
                array('name' => 'Others','status' => 1,'parent' => 1),
                array('name' => 'Office','status' => 1,'parent' => 2),
                array('name' => 'Shop','status' => 1,'parent' => 2),
                array('name' => 'Warehouse','status' => 1,'parent' => 2),
                array('name' => 'Factory','status' => 1,'parent' => 2),
                array('name' => 'Building','status' => 1,'parent' => 2),
                array('name' => 'Showrooms','status' => 1,'parent' => 2),
                array('name' => 'Office in Business Tower','status' => 1,'parent' => 2),
                array('name' => 'Hotels','status' => 1,'parent' => 2),
                array('name' => 'Resorts','status' => 1,'parent' => 2),
                array('name' => 'Guest House','status' => 1,'parent' => 2),
                array('name' => 'Banquet Hall','status' => 1,'parent' => 2),
                array('name' => 'Others','status' => 1,'parent' => 2),
                array('name' => 'Residential','status' => 1,'parent' => 3),
                array('name' => 'Commercial','status' => 1,'parent' => 3),
                array('name' => 'Industrial','status' => 1,'parent' => 3),
                array('name' => 'Agricultural','status' => 1,'parent' => 3),
                array('name' => 'Plot File','status' => 1,'parent' => 3),
                array('name' => 'Plot Affidavit','status' => 1,'parent' => 3),
                array('name' => 'Plot Form ','status' => 1,'parent' => 3),



                
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
        Schema::dropIfExists('property_types');
    }
}
