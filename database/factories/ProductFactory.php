<?php

use Faker\Generator as Faker;

$factory->define(MyLearnLaravel5x\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween(200,999),
        'category_id' => factory(\MyLearnLaravel5x\Category::class)->create()->id,
    ];
});
