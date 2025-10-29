<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Constants\commonConstant;
use App\Models\Country;
use App\Models\TimeZone;

class CreateTimeZoneSeeder extends Seeder
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

            $timezones = $country['timezones'];

            foreach ($timezones as $timezone) {
                TimeZone::create(
                    [
                        'country_id' => $countryModel->id,
                        'iso2' => $country['iso2'],
                        'zone' => $timezone['zone'],
                        'utc_offset' => $timezone['utc_offset'],
                    ]
                );
            }
        }
    }
}
