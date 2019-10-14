<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Address::class, function (Faker $faker) {
    return [
        'country' => $faker->country,
        'state' => $faker->word,
        'city' => $faker->city,
        'street' => $faker->streetAddress,
        'zip' => $faker->randomNumber(5)
    ];
});