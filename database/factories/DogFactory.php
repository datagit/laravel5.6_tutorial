<?php

use Faker\Generator as Faker;

$factory->define(MyLearnLaravel5x\Dog::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
