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
        echo "run seeding at class DatabaseSeeder!\n";
        $this->call(UsersTableSeeder::class);
        $this->call(DogsTableSeeder::class);
        $this->call(FlightsTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
    }
}
