<?php

use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| BaseModel Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Category::class, function (Faker $faker) {
    $title = $faker->sentence(mt_rand(3, 10));
    return [
        'name'        => $title,
        'slug'        => Str::slug($title),
        'image'       => $faker->imageUrl(),
        'description' => $faker->sentence,
    ];
});
