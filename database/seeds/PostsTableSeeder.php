<?php

use App\Models\Post;
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
            // $post->tags()->createMany(factory(Tag::class, 2)->make()->toArray());
            $post->content()->create([
                'body'     => '',
                'markdown' => 'markdown',
            ]);
        });
    }
}
