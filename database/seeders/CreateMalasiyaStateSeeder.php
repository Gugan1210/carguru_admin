<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\CountryState;

class CreateMalasiyaStateSeeder extends Seeder
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
            // dd($state['state']);
            CountryState::create(
                [
                    'country_id' => $country->id,
                    'state_name' => $state['state'],
                    'status' => 1
                ]
            );
        }
    }
}

