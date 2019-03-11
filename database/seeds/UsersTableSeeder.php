<?php

use Illuminate\Database\Seeder;
use App\Models\User;
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
        $admin = factory(User::class)->create([
            'name' => 'admin',
            'email' => 'admin@loyep.com',
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
