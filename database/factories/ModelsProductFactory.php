<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'name' =>$faker->word,
        'detail' =>$faker->paragraph,
        'stock' =>$faker->randomDigit,
        'discount' =>$faker->numberBetween(2,50),
        'price' =>$faker->numberBetween(100,1000),
    ];
});
