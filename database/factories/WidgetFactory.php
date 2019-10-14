<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Widget::class, function (Faker $faker) {
    return [
        'name' => $faker->domainName,
        'price' => $faker->numerify('##.##')
    ];
});