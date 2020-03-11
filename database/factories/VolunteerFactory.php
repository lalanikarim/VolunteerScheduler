<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Volunteer;
use Faker\Generator as Faker;

$factory->define(Volunteer::class, function (Faker $faker) {
    return [
        //
        'bar_code' => $faker->unique()->bankAccountNumber,
        'first_name' => $faker->firstName,
        'middle_name' => '',
        'last_name' => $faker->lastName,
        'phone_number' => $faker->phoneNumber,
        'email' => $faker->email,
    ];
});
