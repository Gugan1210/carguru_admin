<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Constants\commonConstant;
use App\Models\Country;
use App\Models\Unit;

class CreateUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = json_decode(file_get_contents(storage_path(commonConstant::COUNTRY_DETAILS_PATH)), true);

        foreach ($countries as $country) {
            $countryModel = Country::where('iso2', $country['iso2'])->first();

            if (!$countryModel) {
                continue; // skip if country not found
            }

            $units = $country['units'];

            Unit::create(
                [
                    'country_id' => $countryModel->id,
                    'iso2' => $country['iso2'],
                    'length_system' => $units['length']['system'],
                    'length_symbol' => $units['length']['symbol'],
                    'weight_system' => $units['weight']['system'],
                    'weight_symbol' => $units['weight']['symbol'],
                ]
            );

        }
    }
}
