<?php

use App\Models\Content;
use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 3)->create()->each(function ($post) {
            $post->content()->save(factory(Content::class)->make());
            $post->tags()->createMany(factory(Tag::class, 2)->make()->toArray());
        });
    }
}
