<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'service_ligne' => $faker->word,
        'description' => $faker->sentence($nbWords = 6)
    ];
});
