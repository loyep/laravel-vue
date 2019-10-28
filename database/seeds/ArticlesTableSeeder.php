<?php

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Article::class, 100)->create()->each(function ($article) {
            $article->tags()->createMany(factory(Tag::class, 2)->make()->toArray());
            $article->content()->create([
                'body'     => '',
                'markdown' => 'markdown',
            ]);
        });
    }
}
