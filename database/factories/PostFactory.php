<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {

    $title = $faker->sentence(mt_rand(3, 10));
    $user_id = User::pluck('id')->random();
    $category_id = Category::pluck('id')->random();

    return [
        'user_id'      => $user_id,
        'title'        => $title,
        'slug'         => Str::slug($title),
        'category_id'  => $category_id,
        'image'        => $faker->imageUrl(),
        'published_at' => $faker->dateTimeBetween($startDate = '-2 months', $endDate = 'now')
    ];
});
