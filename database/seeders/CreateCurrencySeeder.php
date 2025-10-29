<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Constants\commonConstant;
use App\Models\Country;
use App\Models\Currency;

class CreateCurrencySeeder extends Seeder
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

            $currency = $country['currency'];

            Currency::updateOrCreate(
                ['country_id' => $countryModel->id],
                [
                    'iso2' => $country['iso2'],
                    'code' => $currency['code'],
                    'symbol' => $currency['symbol'],
                    'decimals' => $currency['decimals']
                ]
            );
        }
    }
}
