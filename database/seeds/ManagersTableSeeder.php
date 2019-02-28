<?php

use Illuminate\Database\Seeder;

class ManagersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Manager::create([
            'user_id' => 2,
            'name' => 'ManagerNum2',
            'phone_number' => '73285732',
            'email' => 'ewiqvfdqk@flwq.com'
        ]);

        \App\Models\Manager::create([
            'user_id' => 3,
            'name' => 'ManagerNum3',
            'phone_number' => '73201521',
            'email' => 'fheqw@euwq.ru'
        ]);
    }
}
