<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Profile;
use App\Models\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'from' => factory(Profile::class),
        'to' => factory(Profile::class),
        'amount' => $faker->randomFloat(2, 0, 9999999.99),
        'when' => $faker->dateTime(),
    ];
});
