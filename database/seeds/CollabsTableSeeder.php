<?php

use App\Collabs;
use Illuminate\Database\Seeder;

class CollabsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Collabs::class,4)->create();
    }
}
