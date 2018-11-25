<?php

use Faker\Generator as Faker;

$factory->define(MyLearnLaravel5x\Flight::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
