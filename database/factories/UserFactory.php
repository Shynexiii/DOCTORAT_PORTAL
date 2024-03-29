<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name'    =>  $faker->firstName,
        'last_name'     =>  $faker->lastName,
        'username'      =>  $faker->userName,
        'email'         =>  $faker->safeEmail,
        'password'      =>  Hash::make('123456'),
        'phone_number'  =>  $faker->e164PhoneNumber,
        'Date_Of_Birth' =>  $faker->date($format = 'Y/m/d', $max = 'now'),
    ];
});
