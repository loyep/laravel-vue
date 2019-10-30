<?php

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
        factory(Post::class, 100)->create()->each(function ($article) {
            $article->tags()->createMany(factory(Tag::class, 2)->make()->toArray());
            $article->content()->create([
                'body'     => '',
                'markdown' => 'markdown',
            ]);
        });
    }
}
