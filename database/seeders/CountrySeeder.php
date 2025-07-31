<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = json_decode(file_get_contents("countries.json"),true);
        foreach ($countries as $country){
            $co = new Country();
            $co->name = $country['name'];
            $co->save();
            foreach ($country['regions'] as $region){
                $div = new Division();
                $div->country_id = $co->id;
                $div->name = $region;
                $div->save();
            }
        }
    }
}
