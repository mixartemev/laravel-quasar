<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tariff;
use Faker\Generator as Faker;

$factory->define(Tariff::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'market_type' => $faker->randomNumber(),
        'deposit' => $faker->randomNumber(),
        'min' => $faker->randomNumber(),
        'min_condition' => $faker->randomNumber(),
    ];
});
