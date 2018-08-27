<?php

use Faker\Generator as Faker;

$factory->define(\App\Coupon::class, function (Faker $faker) {
    return [
        'qty' => $faker->randomDigit(),
        'value' => 10,
        'qty' => 100,
        'description' => $faker->sentence(10),
        'user_id' => 1
    ];
});
