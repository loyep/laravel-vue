<?php

use Faker\Generator as Faker;
use App\Models\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'title' => $faker->name,
        'slug' => $faker->slug,
        'category_id' => 1,
//        $table->bigIncrements('id');
//    $table->unsignedBigInteger('user_id')->index();
//    $table->string('title');
//    $table->string('slug')->unique();
//    $table->unsignedBigInteger('category_id')->index();
//    $table->string('meta_title')->nullable();
//    $table->text('meta_keywords')->nullable();
//    $table->text('meta_description')->nullable();
//    $table->text('excerpt')->nullable();
//    $table->unsignedSmallInteger('order')->default(1);
//    $table->unsignedBigInteger('views')->default(0);
//    $table->string('image')->nullable();
//    $table->string('type')->default('post');
//    $table->boolean('is_top')->default(false);
//    $table->enum('status', ['published', 'draft', 'private'])->default('published');
//    $table->boolean('allow_comment')->default(true);
//    $table->softDeletes();
//    $table->timestamp('published_at')->nullable()->useCurrent();
//    $table->timestamp('viewed_at')->nullable();
//    $table->timestamps();
    ];
});
