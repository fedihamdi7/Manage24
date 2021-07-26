<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'social_reason'=> $faker->word,
        'activity'=> $faker->word,
        'adresse 1'=> $faker->address(),
        'adresse 2'=> $faker->address(),
        'phone'=> $faker->phoneNumber(),
        'fax'=> $faker->phoneNumber(),
        'email'=> $faker->email(),
        'contact_person'=> $faker->word(),
    ];
});
