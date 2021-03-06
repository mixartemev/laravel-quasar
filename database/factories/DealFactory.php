<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Deal;
use App\Models\Profile;
use Faker\Generator as Faker;

$factory->define(Deal::class, function (Faker $faker) {
    return [
        'ticker' => $faker->word,
        'price' => $faker->randomFloat(2, 0, 9999999.99),
        'profile_id' => factory(Profile::class),
        'when' => $faker->dateTime(),
    ];
});
