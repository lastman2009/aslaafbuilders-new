<?php

namespace Database\Seeders;

use App\Society;
use Illuminate\Database\Seeder;

class SocietyBlockSeeder extends Seeder
{
    public function run(): void
    {
        $blocksByPhase = [
            'DHA Lahore Phase 1' => ['Block A', 'Block B', 'Block C', 'Block D', 'Block E', 'Block F', 'Block G', 'Block H', 'Block J', 'Block K'],
            'DHA Lahore Phase 5' => ['Block A', 'Block B', 'Block C', 'Block D', 'Block E', 'Block F', 'Block G', 'Block H', 'Block J'],
            'DHA Lahore Phase 6' => ['Block A', 'Block B', 'Block C', 'Block D', 'Block E', 'Block F', 'Block G', 'Block H'],
            'DHA Lahore Phase 7' => ['Block A', 'Block B', 'Block C', 'Block D', 'Block E', 'Block F', 'Block G'],
            'DHA Lahore Phase 8' => ['Block Y', 'Block Z', 'Ashiana', 'Broadway'],
            'DHA Lahore Phase 9 Prism' => ['Block A', 'Block B', 'Block C', 'Block D', 'Block E', 'Block F', 'Sector A', 'Sector B'],
            'DHA Lahore Phase 11 Rahbar' => ['Sector 1', 'Sector 2', 'Sector 3', 'Sector 4', 'Sector 5'],
        ];

        foreach ($blocksByPhase as $societyName => $blocks) {
            $society = Society::where('name', $societyName)->first();

            if (!$society) {
                continue;
            }

            foreach ($blocks as $blockName) {
                $society->blocks()->firstOrCreate(
                    ['name' => $blockName],
                    ['status' => 1]
                );
            }
        }
    }
}
