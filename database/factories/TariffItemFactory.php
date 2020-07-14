<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tariff;
use App\Models\TariffItem;
use Faker\Generator as Faker;

$factory->define(TariffItem::class, function (Faker $faker) {
    return [
        'tariff_id' => factory(Tariff::class),
        'level' => $faker->randomNumber(),
        'percent' => $faker->randomFloat(3, 0, 9.999),
    ];
});
