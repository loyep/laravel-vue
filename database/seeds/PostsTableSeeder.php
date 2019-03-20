<?php

use App\Models\Content;
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
        factory(Post::class, 20)->create()->each(function ($user) {
            $user->content()->save(factory(Content::class)->make());
        });;
    }
}
