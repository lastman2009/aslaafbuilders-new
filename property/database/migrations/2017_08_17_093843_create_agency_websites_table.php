<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencyWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agency_websites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('theme_id')->nullable();
            $table->string('agency_name')->nullable();
            $table->text('logo')->nullable();
            $table->text('banners')->nullable();
            $table->text('about_us')->nullable();
            $table->text('ceo_message')->nullable();
            $table->text('ceo_image')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();

            $table->integer('status')->nullable();
            $table->integer('verified')->nullable();
            $table->text('verification_documents')->nullable();
            $table->string('url')->nullable();
            $table->string('post_fix')->nullable();

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
        Schema::dropIfExists('agency_websites');
    }
}
