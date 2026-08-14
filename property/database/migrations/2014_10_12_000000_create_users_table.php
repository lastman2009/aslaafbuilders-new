<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('facebook_id')->nullable();
            $table->bigInteger('google_id')->nullable();
            $table->integer('theme_id')->nullable();
            $table->integer('role_id')->unsigned();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('google_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('status')->nullable();
            $table->string('address')->nullable();
            $table->string('cnic')->nullable();
            $table->string('city')->nullable();
            $table->string('image')->nullable();
            $table->string('activation_code')->nullable();
            $table->string('password');       
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
