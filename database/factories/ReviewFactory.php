<?php

use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {
    return [
      'title' => $faker->sentence(),
      'stars' => rand(1,5),
      'description' => $faker->paragraph(1),
    ];
});
