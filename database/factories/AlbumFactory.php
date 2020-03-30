<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Album;
use App\Playlist;
use Faker\Generator as Faker;

$factory->define(Album::class, function (Faker $faker) {
    return [
        'user_id' => random_int(1, 10),
        'name' => $faker->title(),
        'img_url' => 'https://source.unsplash.com/random/562x562'
    ];
});

$factory->define(Playlist::class, function (Faker $faker) {
    return [
        'user_id' => random_int(1, 10),
        'name' => $faker->title(),
        'img_url' => 'https://source.unsplash.com/random/562x562'
    ];
});
