<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Alex manager',
            'email' => 'moderator@gmail.com',
            'password' => bcrypt('123456'),
            'api_token' => Str::random(80)
        ]);
    }
}
