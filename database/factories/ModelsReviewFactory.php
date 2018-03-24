<?php

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(App\Models\Review::class, function (Faker $faker) {
    return [

        'product_id' => function(){
        //give us random number from the number of the columns of the table
        return Product::all()->random();

        },
        'customer' =>$faker->name,
        'review' =>$faker->paragraph,
        'star' =>$faker->numberBetween(0,5),

    ];
});
