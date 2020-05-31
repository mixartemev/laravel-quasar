<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Market;
use Faker\Generator as Faker;

$factory->define(Market::class, function (Faker $faker) {
    return [
        'market' => $faker->randomNumber(),
        'ts_code' => $faker->word,
        'profile_id' => factory(\App\Profile::class),
        'tariff_id' => factory(\App\Tariff::class),
        'cur' => $faker->randomElement(["rub","usd"]),
    ];
});
