<?php

namespace Database\Seeders;

use App\Society;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SocietySeeder extends Seeder
{
    public function run(): void
    {
        $societies = [
            ['province' => 'Punjab', 'city' => 'Lahore', 'name' => 'DHA Lahore Phase 1'],
            ['province' => 'Punjab', 'city' => 'Lahore', 'name' => 'DHA Lahore Phase 5'],
            ['province' => 'Punjab', 'city' => 'Lahore', 'name' => 'DHA Lahore Phase 6'],
            ['province' => 'Punjab', 'city' => 'Lahore', 'name' => 'DHA Lahore Phase 7'],
            ['province' => 'Punjab', 'city' => 'Lahore', 'name' => 'DHA Lahore Phase 8'],
            ['province' => 'Punjab', 'city' => 'Lahore', 'name' => 'DHA Lahore Phase 9 Prism'],
            ['province' => 'Punjab', 'city' => 'Lahore', 'name' => 'DHA Lahore Phase 11 Rahbar'],
        ];

        foreach ($societies as $society) {
            Society::firstOrCreate(
                ['slug' => Str::slug($society['name'])],
                $society + ['status' => 1]
            );
        }
    }
}
