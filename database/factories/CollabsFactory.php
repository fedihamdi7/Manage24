<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Collab;
use App\Grade;
use App\Service;
use Faker\Generator as Faker;

$factory->define(Collab::class, function (Faker $faker) {
    return [
        'collab_name'=> $faker->name(),
        'collab_last_name'=> $faker->lastName(),
        'collab_dateIn'=> $faker->date(),
        'collab_dateOut'=>$faker->date(),
        'collab_phone'=>$faker->numerify('########'),
        'collab_mail'=>$faker->email(),
        'grade_id'=> Grade::get('id')->random(),
        'service_id'=> Service::get('id')->random(),

    ];
});
