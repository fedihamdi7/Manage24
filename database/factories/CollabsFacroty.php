<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Collabs;
use Faker\Generator as Faker;

$factory->define(Collabs::class, function (Faker $faker) {
    return [
        'collab_name'=> $faker->name(),
        'collab_last_name'=> $faker->lastName(),
        'collab_dateIn'=> $faker->date(),
        'collab_dateOut'=>$faker->date(),
        'collab_phone'=>$faker->numerify('########'),
        'collab_mail'=>$faker->email(),
    ];
});
