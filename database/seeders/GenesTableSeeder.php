<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genes')->insert([
            ['name' => 'tiên hiệp'],
            ['name' => 'tru tiên'],
            ['name' => 'quỷ'],
            ['name' => 'võ thuật'],
            ['name' => 'tft'],
        ]);
    }
}
