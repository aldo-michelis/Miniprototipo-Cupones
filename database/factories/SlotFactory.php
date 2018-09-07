<?php

use Faker\Generator as Faker;

$factory->define(App\Slot::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'merchant_id' => 1,
        'coupon_id' => 1,
        'cad' => now(),
        'status' => 0
    ];
});
