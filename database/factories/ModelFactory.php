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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    $password = bcrypt('123qazwsx');

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password,
        'remember_token' => str_random(10),
        'created_at' => $date_time,
        'updated_at' => $date_time,
        'activated' => true,
        'deleted' => false,
        'status' => '01',
        'last_updated_by' => 1,
        'last_updated_type' => '02',
    ];
});
