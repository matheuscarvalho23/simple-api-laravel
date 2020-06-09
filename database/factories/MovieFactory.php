<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Movie::class, function (Faker $faker) {
    return [
        'name'        => $faker->name,
        'distributor' => $faker->text,
        'status'      => '1',
        'trailer'     => $faker->text,
        'synopsis'    => $faker->text,
    ];
});
