<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencyOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agency_offices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agency_website_id')->nullable();
            $table->string('telephone')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('uan_number')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();

            $table->text('fb_link')->nullable();
            $table->text('google_link')->nullable();
            $table->string('city')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('agency_offices');
    }
}
