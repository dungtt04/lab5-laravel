<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = DB::table('genes')->pluck('id');

        foreach(range(1,50) as $index){
            DB::table('movies')->insert([
                'title' => 'Movie ' . $index,
                'poster' => 'poster_' . $index . '.jpg',
                'intro' => 'This is an introduction for Movie ' . $index,
                'release_date' => now()->subDays(rand(1, 365))->toDateString(),
                'genre_id' => $genres->random(),
            ]);
        }
    }
}
