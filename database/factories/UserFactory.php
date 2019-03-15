<?php

use App\Models\User;
use App\Support\Helper;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    $name = $faker->name;
    $email = $faker->unique()->safeEmail;

    return [
        'name'              => $name,
        'email'             => $email,
        'email_verified_at' => now(),
        'display_name'      => $name,
        'avatar'            => Helper::getAvatar($email),
        'password'          => Hash::make('123123'),
        'url'               => 'https://loyep.com',
        'remember_token'    => Str::random(10),
    ];
});
