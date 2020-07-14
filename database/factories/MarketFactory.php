<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Market;
use App\Models\Profile;
use App\Models\Tariff;
use Faker\Generator as Faker;

$factory->define(Market::class, function (Faker $faker) {
    return [
        'market' => $faker->randomNumber(),
        'ts_code' => $faker->word,
        'profile_id' => factory(Profile::class),
        'tariff_id' => factory(Tariff::class),
    ];
});
