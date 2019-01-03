<?php

use Faker\Generator as Faker;

$factory->define(MyLearnLaravel5x\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
