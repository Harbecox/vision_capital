<?php

namespace Database\Seeders;

use App\Models\Settings;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Settings::create([
            "name" => "check",
            "value" => [
                "Company_Name" => fake()->company(),
                "Address" => fake()->address(),
                "State" => fake()->address(),
                "City" => fake()->city(),
                "Country" => fake()->country(),
                "Zip_Code" => fake()->numerify("######"),
            ]
        ]);

        Settings::create([
            "name" => "deposit_limit",
            "value" => [
                "first" => "5000",
                "next" => "100"
            ]
        ]);

        $month = [];
        $date = Carbon::now();
        $date = Carbon::now()->startOfMonth()->addDays(4)->subMonth($date->month - 2);
        for ($i = 0;$i < 12;$i++){
            $month[] = $date->toDateString();
            $date = $date->addMonth();
        }

        Settings::create([
            "name" => "x-date",
            "value" => $month
        ]);

        Settings::create([
            "name" => "d-prc",
            "value" => 1.5
        ]);

        Settings::create([
            "name" => "acc_start_num",
            "value" => false
        ]);

    }
}
