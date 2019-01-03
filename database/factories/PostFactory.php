<?php

use Faker\Generator as Faker;

$factory->define(MyLearnLaravel5x\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'body' => $faker->paragraph,
    ];
});
