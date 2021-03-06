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
        $this->call(UserSeeder::class);
        $this->call(TariffSeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(MarketSeeder::class);
    }
}
