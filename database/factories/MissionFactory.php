<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use App\Mission;
use App\Service;
use Faker\Generator as Faker;

$factory->define(Mission::class, function (Faker $faker) {
    return [
        'service_id'=> Service::get('id')->random(),
        'client_id'=> Client::get('id')->random(),
        'date_start'=> $faker->date(),
        'date_finish'=> $faker->date(),
    ];
});
