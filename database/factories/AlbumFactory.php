<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Album;
use Faker\Generator as Faker;

$factory->define(Album::class, function (Faker $faker) {
    return [
        'user_id' => random_int(1, 50),
        'name' => $faker->title(),
        'img_url' => 'https://images.hdqwalls.com/wallpapers/abstract-colorful-texture-square-7f.jpg'
    ];
});
