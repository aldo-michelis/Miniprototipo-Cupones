<?php

use Faker\Generator as Faker;

$factory->define(\App\Payment::class, function (Faker $faker) {
    return [
        'cutomer_id' => 2,
        'merchant_id' => 1,
        'amount' => 10,
        'status' => 0
    ];
});
