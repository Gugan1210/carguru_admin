<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Constants\commonConstant;
use App\Models\Country;

class CreateCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = json_decode(file_get_contents(storage_path(commonConstant::COUNTRY_DETAILS_PATH)), true);

        foreach ($countries as $country) {
            Country::updateOrCreate(
                ['iso2' => $country['iso2']],
                [
                    'iso3' => $country['iso3'],
                    'country_name' => $country['country'],
                    'phone_code' => $country['phone_code'],
                    'continent' => $country['continent'],
                    'status' => 1,
                ]
            );
        }
    }
}
