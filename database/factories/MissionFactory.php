<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use App\Mission;
use App\Service;
use Faker\Generator as Faker;

$factory->define(Mission::class, function (Faker $faker) {
    return [
        'mission_name'=>$faker->word(),
        'service_id'=> Service::get('id')->random(),
        'client_id'=> Client::get('id')->random(),
        'start_time'=> $faker->time(),
        'end_time'=> $faker->time(),
        'elapsed_time'=> $faker->time(),
    ];
});
