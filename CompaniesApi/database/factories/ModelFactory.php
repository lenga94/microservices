<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Company::class, function (Faker\Generator $faker) {
    return [
        'company_name' => $faker->company,
        'company_profile' => $faker->sentences(3, true),
        'status' => $faker->randomElement(['ENABLED', 'DISABLED']),
        'company_image' => $faker->url,
    ];
});
