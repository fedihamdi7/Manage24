<?php

use App\Collab;
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
        factory(Collab::class,4)->create();
    }
}
