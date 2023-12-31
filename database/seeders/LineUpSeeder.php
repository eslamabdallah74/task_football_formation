<?php

namespace Database\Seeders;

use App\Models\LineUp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LineUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $linupsData = [
            ['plan' => '4-4-2'],
            ['plan' => '4-5-1'],
            ['plan' => '3-4-3'],
            ['plan' => '4-3-3'],
            ['plan' => '3-5-2'],
            ['plan' => '4-2-3-1'],
            ['plan' => '5-4-1'],
            ['plan' => '4-1-4-1'],
            ['plan' => '4-3-2-1'],
            ['plan' => '4-4-1-1'],
        ];

        foreach ($linupsData as $linupInfo) {
            LineUp::create($linupInfo);
        }
    }
}