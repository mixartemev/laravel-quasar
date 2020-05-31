<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'code' => $faker->word,
        'title' => $faker->sentence(4),
        'market_type' => $faker->randomNumber(),
        'tariff_id' => factory(\App\Tariff::class),
        'user_id' => factory(\App\User::class),
    ];
});
