<?php

namespace Database\Seeders;

use App\Models\Fee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fee::create([
            "min" => 5000,
            "max" => 24999,
            "prc" => 15
        ]);

        Fee::create([
            "min" => 25000,
            "max" => 74999,
            "prc" => 10
        ]);

        Fee::create([
            "min" => 75000,
            "max" => 249999,
            "prc" => 7.5
        ]);

        Fee::create([
            "min" => 250000,
            "prc" => 5
        ]);
    }
}
