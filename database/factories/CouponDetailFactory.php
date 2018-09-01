<?php

use Faker\Generator as Faker;

$factory->define(\App\CouponDetail::class, function (Faker $faker) {
    return [
        'coupon_id' => $faker->numberBetween(1,100),
        'code' => $faker->word,
        'user_id' => 0,
        'status' => false
    ];
});
