<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Adds real Eloquent soft deletes to properties.
     *
     * This is separate from the existing `status` column (which still
     * drives the trash/restore/active workflow in the dashboard). Calling
     * $property->delete() now sets deleted_at instead of removing the row,
     * and Eloquent's global SoftDeletingScope automatically excludes any
     * soft-deleted property from every query app-wide unless withTrashed()
     * or onlyTrashed() is explicitly used.
     */
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
