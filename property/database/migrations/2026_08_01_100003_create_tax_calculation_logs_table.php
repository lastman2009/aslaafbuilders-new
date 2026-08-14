<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxCalculationLogsTable extends Migration
{
    public function up()
    {
        Schema::create('tax_calculation_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->decimal('property_value', 15, 2);
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->unsignedBigInteger('society_id')->nullable();
            $table->string('property_type')->nullable();
            $table->string('category')->nullable();
            $table->string('plot_size')->nullable();
            $table->string('buyer_type')->nullable();
            $table->string('tax_status')->nullable();
            $table->string('transfer_type')->nullable();
            $table->json('breakdown');
            $table->decimal('total', 15, 2);
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();

            $table->index('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tax_calculation_logs');
    }
}
