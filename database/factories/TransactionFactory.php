<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'from' => factory(\App\Profile::class),
        'to' => factory(\App\Profile::class),
        'amount' => $faker->randomFloat(2, 0, 9999999.99),
        'when' => $faker->dateTime(),
    ];
});
