<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaidPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paid_properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('property_id');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('status')->default(0);
            $table->integer('discount_offer_id')->nullable();
            $table->string('price')->nullable();
            $table->string('recieved_amount')->nullable();
            $table->integer('package_id');
            $table->integer('support_id');
            $table->integer('payment_method_id');
            $table->integer('transaction_id');
            $table->integer('featured_ad');
            $table->integer('hot_ad');
            $table->integer('popup_ad');
            $table->integer('static_ad');
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
        Schema::dropIfExists('paid_properties');
    }
}
