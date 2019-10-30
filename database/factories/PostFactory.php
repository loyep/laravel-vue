<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

static $types = ['image', 'default', 'status', 'video', 'audio'];
static $statuses = ['draft', 'published', 'private'];

$factory->define(Post::class, function (Faker $faker) use ($types, $statuses) {
    $title = $faker->sentence(mt_rand(3, 5));
    $user_id = User::pluck('id')->random();
    $category_id = Category::pluck('id')->random();
    $type = collect($types)->random();
    $status = collect($statuses)->random();

    return [
        'user_id'      => $user_id,
        'title'        => $title,
        'slug'         => Str::slug($title),
        'category_id'  => $category_id,
        'image'        => '/images/bg/bg-'.mt_rand(1, 5).'.jpg',
        'status'       => $status,
        'type'         => $type,
        'excerpt'      => $faker->sentence(mt_rand(3, 10)),
        'published_at' => $faker->dateTimeBetween($startDate = '-2 months', $endDate = 'now'),
    ];
});
