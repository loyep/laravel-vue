<?php

use App\Models\Tag;
use Faker\Generator as Faker;

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

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'name'        => $faker->word,
        'slug'        => $faker->unique()->slug,
        'image'       => '',
        'description' => $faker->sentence,
    ];
});
