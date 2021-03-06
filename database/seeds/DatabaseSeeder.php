<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(GradesTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(CollabsTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(MissionsTableSeeder::class);
        $this->call(TimesTableSeeder::class);

    }
}
