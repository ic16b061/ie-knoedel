<?php

use Faker\Generator as Faker;

$factory->define(App\Recipe::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'image' => $faker->image(),
        'description' => $faker->paragraph,
        'category' =>  $faker->name,
        'rating' => $faker->numberBetween($min = 1, $max = 5),
        ];
});
