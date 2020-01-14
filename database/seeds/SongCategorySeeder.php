<?php

use App\SongCategory;
use Illuminate\Database\Seeder;

class SongCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        SongCategory::create(['name' => 'Pop']);
        SongCategory::create(['name' => 'Rock']);
        SongCategory::create(['name' => 'Metal']);
        SongCategory::create(['name' => 'Electronic']);
        SongCategory::create(['name' => 'Jazz']);
        SongCategory::create(['name' => 'Classical']);
        SongCategory::create(['name' => 'Rap']);
        SongCategory::create(['name' => 'Blues']);
        SongCategory::create(['name' => 'Hip Hop']);
        SongCategory::create(['name' => 'Acoustic']);
        SongCategory::create(['name' => 'Trance']);
        SongCategory::create(['name' => 'Dub']);
        SongCategory::create(['name' => 'Dubstep']);

    }
}
