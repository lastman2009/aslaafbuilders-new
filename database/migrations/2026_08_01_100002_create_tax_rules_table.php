<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxRulesTable extends Migration
{
    public function up()
    {
        Schema::create('tax_rules', function (Blueprint $table) {
            $table->id();

            // Scope columns — nullable means "applies to any" (wildcard) at that level.
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->unsignedBigInteger('society_id')->nullable();
            $table->string('property_type')->nullable();   // residential, commercial
            $table->string('category')->nullable();        // plot, house, apartment
            $table->string('plot_size')->nullable();        // e.g. 5_marla, 1_kanal
            $table->string('buyer_type')->nullable();       // buyer, seller
            $table->string('tax_status')->nullable();       // filer, late_filer, non_filer, overseas
            $table->string('transfer_type')->nullable();    // normal, gift, inheritance

            // Value-slab matching (e.g. FBR 236K/236C bands) — independent of computed-fee min/max below.
            $table->decimal('value_from', 15, 2)->nullable();
            $table->decimal('value_to', 15, 2)->nullable();

            $table->string('tax_name');
            $table->string('tax_code'); // e.g. FBR_236K, STAMP_DUTY, DHA_TRANSFER — used to dedupe winning rule per breakdown line
            $table->string('calculation_type'); // percentage, fixed, percentage_plus_fixed

            $table->decimal('percentage', 8, 4)->nullable();
            $table->decimal('fixed_amount', 15, 2)->nullable();
            $table->decimal('minimum_amount', 15, 2)->nullable();
            $table->decimal('maximum_amount', 15, 2)->nullable();

            $table->unsignedInteger('priority')->default(0); // higher wins on tie after specificity ranking
            $table->date('effective_from');
            $table->date('effective_to')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=active, 0=inactive');

            $table->string('source_url')->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();

            $table->index(['tax_code', 'status']);
            $table->index(['city', 'society_id']);
            $table->foreign('society_id')->references('id')->on('societies')->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tax_rules');
    }
}
