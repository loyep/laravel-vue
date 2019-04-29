<?php

use App\Models\Content;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 100)->create()->each(function ($post) {
            $post->content()->save(factory(Content::class)->make());
            $post->tags()->createMany(factory(Tag::class, 2)->make()->toArray());
        });
    }
}
