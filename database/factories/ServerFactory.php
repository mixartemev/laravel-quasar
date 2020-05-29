<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Server;
use Faker\Generator as Faker;

$factory->define(Server::class, function (Faker $faker) {
    return [
        'code' => $faker->word,
        'cur' => $faker->randomElement(["rub","usd"]),
        'market_type' => $faker->randomElement(["found","forex","forts"]),
    ];
});
