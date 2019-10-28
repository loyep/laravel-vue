<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
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
    static $password;

    $name = $faker->name;
    $email = $faker->unique()->safeEmail;

    return [
        'name'              => Str::slug($name) ?: Str::slug($faker->words(2, true)),
        'email'             => $email,
        'display_name'      => $name,
        'email_verified_at' => now(),
        'avatar'            => getAvatar($email),
        'password'          => $password ?: $password = Hash::make('123123'),
        'url'               => 'https://loyep.com',
        'remember_token'    => Str::random(10),
    ];
});