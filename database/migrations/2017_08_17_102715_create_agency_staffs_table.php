<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencyStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agency_staffs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agency_website_id')->nullable();
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email')->nullable();
            $table->integer('status')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('google_plus')->nullable();
            $table->text('image')->nullable();
            $table->text('site_profile_url')->nullable();
            $table->integer('year_of_service')->nullable();
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
        Schema::dropIfExists('agency_staffs');
    }
}
