<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    $volunteers = \App\Models\Volunteer::all()->map(function($v){return $v->id;});
    return [
        //
        "name" => $faker->word,
        "lead_id" => $volunteers[rand(0,$volunteers->count()-1)],
    ];
});
