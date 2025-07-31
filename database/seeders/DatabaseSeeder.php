<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Settings;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CountrySeeder::class);
//        $this->call(BankSeeder::class);

        $this->call(SettingsSeeder::class);
        $this->call(AdminSeeder::class);

        $this->call(AdminSettingsSeeder::class);
        $this->call(FeeSeeder::class);

//        $this->call(UserSeeder::class);
    }
}
