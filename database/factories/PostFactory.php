<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

static $types = ['image', 'default', 'status', 'video', 'audio'];

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence(mt_rand(3, 5));
    $user_id = User::pluck('id')->random();
    $category_id = Category::pluck('id')->random();
    $type = collect(['image', 'default', 'status', 'video', 'audio'])->random();

    return [
        'user_id'      => $user_id,
        'title'        => $title,
        'slug'         => Str::slug($title),
        'category_id'  => $category_id,
        'image'        => $faker->imageUrl(),
        'type'         => $type,
        'excerpt'      => $faker->sentence(mt_rand(3, 10)),
        'published_at' => $faker->dateTimeBetween($startDate = '-2 months', $endDate = 'now'),
    ];
});
