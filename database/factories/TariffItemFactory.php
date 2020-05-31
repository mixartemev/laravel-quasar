<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TariffItem;
use Faker\Generator as Faker;

$factory->define(TariffItem::class, function (Faker $faker) {
    return [
        'tariff_id' => factory(\App\Tariff::class),
        'level' => $faker->randomNumber(),
        'percent' => $faker->randomFloat(3, 0, 9.999),
    ];
});
