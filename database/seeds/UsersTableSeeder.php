<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, 10)->create()->each(function ($user) {
            $user->meta()->saveMany(factory(App\Models\Meta::class, 5)->make());
        });
    }
}
