<?php

use Illuminate\Database\Seeder;

class BusinessHoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BusinessHour::create([
            'manager_id' => 2,
            'start' => \Carbon\Carbon::now(),
            'finish' => \Carbon\Carbon::now()->addDay()
        ]);
    }
}
