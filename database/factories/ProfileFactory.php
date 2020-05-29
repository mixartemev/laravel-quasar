<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'code' => $faker->word,
        'name' => $faker->name,
        'commission' => $faker->randomFloat(4, 0, 9.9999),
        'user_id' => factory(\App\User::class),
        'server_id' => factory(\App\Server::class),
    ];
});
