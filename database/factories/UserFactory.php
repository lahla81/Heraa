<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Plug::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'head' => $faker->sentences(7,true),
        'subtitle' => $faker->sentence,
        'body' => $faker->sentences(14,true),
        'simage' => $faker->image('images',300,200, null, false),
        'image' => $faker->image('images',800,400, null, false),
        'user_id' => App\User::inRandomOrder()-first()->id,
        'created_at' =>\Carbon\Carbon::createFromDate(2018, rand(1, Carbon\Carbon::now()->month),rand(1-28))
    ];
});