<?php

// Database seeder
// Please visit https://github.com/fzaninotto/Faker for more options

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Bluesky_model::class, function (Faker\Generator $faker) {

    return [
        'version' => $faker->word(),
    ];
});
