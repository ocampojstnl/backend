<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Customer::class, function (Faker $faker) {
    return [   
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'company_id' => factory(\App\Company::class)->create(),
        'active' => rand(0, 2),
    ];
});
