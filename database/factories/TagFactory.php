<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tag;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Tag::class, function (Faker $faker) {
    $title = $faker->words(3, true);

    return [
        'name'        => $title,
        'slug'        => Str::slug($title),
        'image'       => $faker->imageUrl(),
        'description' => $faker->sentence,
    ];
});
