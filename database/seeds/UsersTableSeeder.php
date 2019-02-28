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
        \App\Models\User::create([
            'name' => 'User1',
            'login' => 'someLogin1',
            'password' => bcrypt('qwertyuiop'),
        ]);

        \App\Models\User::create([
            'name' => 'User2',
            'login' => 'someLogin2',
            'password' => bcrypt('asdfghjkl'),
        ]);

        \App\Models\User::create([
            'name' => 'User3',
            'login' => 'someLogin3',
            'password' => bcrypt('zxcvbnm,'),
        ]);
    }
}
