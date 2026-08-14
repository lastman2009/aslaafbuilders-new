<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdvancedFieldsToTaxRulesTable extends Migration
{
    public function up()
    {
        Schema::table('tax_rules', function (Blueprint $table) {
            $table->unsignedBigInteger('block_id')->nullable()->after('society_id');
            $table->foreign('block_id')->references('id')->on('society_blocks')->nullOnDelete();

            // Numeric size band (in Marla) — replaces the plot_size enum for matching.
            // A 5 Marla plot = 5, 1 Kanal = 20 Marla, so all Kanal/Marla/Sqft combinations
            // normalize to one comparable number on the form before hitting the API.
            $table->decimal('size_from', 10, 2)->nullable()->after('plot_size');
            $table->decimal('size_to', 10, 2)->nullable()->after('size_from');

            // Which figure the percentage is applied to: the user-declared price,
            // or the DC (Deputy Commissioner) valuation table figure. An "Agreement
            // to Sell: Simple / DC Value" toggle picks this, it does not pick a rule.
            $table->string('value_basis')->nullable()->after('calculation_type')
                ->comment('declared or dc; null = not basis-specific');

            // When true, the computed amount is multiplied by the submitted owner
            // count instead of being scope-matched against a specific number.
            $table->boolean('per_owner')->default(false)->after('maximum_amount');

            // Line-item toggles. Each is its own scope column: null = wildcard,
            // true/false = only matches when the request's toggle equals it.
            // Modeled as separate tax_codes (VERIFICATION_FEE, BIANA_FEE,
            // ONLINE_PAYMENT_SURCHARGE) rather than modifiers on every rule.
            $table->boolean('requires_verification')->nullable()->after('transfer_type');
            $table->boolean('biana_included')->nullable()->after('requires_verification');
            $table->string('stamp_duty_payment_method')->nullable()->after('biana_included')
                ->comment('bank or online; null = applies to any method');
        });
    }

    public function down()
    {
        Schema::table('tax_rules', function (Blueprint $table) {
            $table->dropForeign(['block_id']);
            $table->dropColumn([
                'block_id', 'size_from', 'size_to', 'value_basis', 'per_owner',
                'requires_verification', 'biana_included', 'stamp_duty_payment_method',
            ]);
        });
    }
}
