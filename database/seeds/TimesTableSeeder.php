<?php

use App\Time;
use Illuminate\Database\Seeder;

class TimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Time::class, 5)->create();
    }
}
