<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Collab;
use App\Mission;
use App\Time;
use Faker\Generator as Faker;

$factory->define(Time::class, function (Faker $faker) {
    return [
        'mission_id' => Mission::get('id')->random(),
        'collab_id' => Collab::get('id')->random(),
        'date_start'=>$faker->date(),
        'date_finish'=>$faker->date(),
        'start_time'=>$faker->time(),
        'finish_time'=>$faker->time(),
        'elapsed_time'=>$faker->time(),
    ];
});
