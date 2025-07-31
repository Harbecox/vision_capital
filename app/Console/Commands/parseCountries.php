<?php

namespace App\Console\Commands;

use App\Models\Country;
use App\Models\Division;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class parseCountries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:parse-countries';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $headers = [
            "Authorization" => 'Bearer fD8WzGr8jUTnrPt_fgPfjvFNhadEtz',
        ];
        $response = Http::withHeaders($headers)->get('https://data-api.oxilor.com/rest/countries');
        $data = $response->json();
        $countries = [];
        foreach ($data as $item){
            $q = [
                'parentId' => $item['id'],
                'first' => 100,
            ];
            $country = [
                "name" => $item['name'],
                "regions" => []
            ];

            $response_2 = Http::withHeaders($headers)->get("https://data-api.oxilor.com/rest/child-regions",$q);
            $regions = $response_2->json();
            foreach ($regions['edges'] as $region){
                if($region['node']['type'] == "division1") {
                    $country['regions'][] = $region['node']['name'];
                }
            }
            $this->info($item['name']);
            $countries[] = $country;
        }
        file_put_contents("countries.json",json_encode($countries,256));
    }
}
