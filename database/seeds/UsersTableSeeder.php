<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        User::create([
            'name' => 'Alex admin',
            'email' => 'administrator@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
            'api_token' => Str::random(80)
        ]);
        User::create([
            'name' => 'Alex manager',
            'email' => 'moderator@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'moderator',
            'api_token' => Str::random(80)
        ]);
    }
}
