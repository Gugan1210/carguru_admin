<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\CountryState;
use App\Models\CountryStateCity;

class CreateMalasiyaStateCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stateModel = json_decode(file_get_contents(storage_path('app/public/files/malaysia.json')), true);



        $country = Country::where('country_name', $stateModel['country']['name'])->first();


        $states = $stateModel['states'];

        foreach ($states as $state) {
            $stateData = CountryState::where('state_name', $state['state'])->first();
            $cities = $state['cities'];
            // dd($cities);
            foreach ($cities as $city)
                CountryStateCity::create(
                    [
                        'country_id' => $stateData->country_id,
                        'state_id' => $stateData->id,
                        'city_name' => $city['name'],
                        'lat' => $city['lat'],
                        'lng' => $city['lng'],
                        'status' => 1
                    ]
                );
        }
    }
}
