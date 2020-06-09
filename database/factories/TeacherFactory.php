<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'first_name'    => $faker->firstName,
        'last_name'     => $faker->lastName,
        'status'        => $faker->randomElement($array = array ('0','1')),
        
    ];
});
