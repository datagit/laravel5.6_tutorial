<?php

use Faker\Generator as Faker;

$factory->define(MyLearnLaravel5x\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->city
    ];
});
