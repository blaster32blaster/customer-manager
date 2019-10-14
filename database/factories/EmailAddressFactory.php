<?php

use Faker\Generator as Faker;

$factory->define(App\Models\EmailAddress::class, function (Faker $faker) {
    $customer = \App\Models\Customer::all()->random(1)->first();
    return [
        'address' => $faker->email,
        'customer_id' => $customer->id,
    ];
});