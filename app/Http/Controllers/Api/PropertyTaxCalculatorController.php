<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Society;

class PropertyTaxCalculatorController extends Controller
{
    /**
     * Powers the Phase -> Block cascading dropdown on the calculator form.
     * The tax calculation itself is server-rendered (see
     * PropertyTransferCalculatorController), not fetched from this API.
     */
    public function blocksForSociety(Society $society)
    {
        return response()->json([
            'success' => true,
            'blocks' => $society->blocks()->active()->orderBy('name')->get(['id', 'name']),
        ]);
    }
}
