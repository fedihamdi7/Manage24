<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use App\User;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'social_reason'=> $faker->word,
        'activity'=> $faker->word,
        'adresse1'=> $faker->address(),
        // 'adresse2'=> $faker->address(),
        'phone'=> $faker->phoneNumber(),
        'fax'=> $faker->phoneNumber(),
        'email'=> $faker->email(),
        'contact_person'=> User::get()->random(),
        'website'=> $faker->url(),
        'type'=> $faker->randomElement($array = array ('local','foreign')),
    ];
});
