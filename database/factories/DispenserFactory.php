<?php

use Faker\Generator as Faker;

$factory->define(\App\Dispenser::class, function (Faker $faker) {
    return [
            'qty' => 10,
            'user_id' => 1,
            'description' => 'Dispensador de Ejemplo',
            'cad' => date('Y-m-d', strtotime('+1 year'))
    ];
});
