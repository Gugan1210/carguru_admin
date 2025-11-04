<?php

namespace App\Traits;

use App\Constants\commonConstant;
use App\Models\BeautifyManagement;
use App\Models\PromoDiscount;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Exception;
use DB;
use App\Models\Country;
use App\Models\Make;
use App\Models\Models;
use App\Models\Variant;
use App\Models\CarMake;
use App\Models\CarEngine;
use App\Models\CarDiamension;
use App\Models\CarWarranty;
use App\Models\CarBrake;
use App\Models\Feature;
use Spatie\Color\Named;
use App\Models\CarInfo;
use App\Models\CarMakeFuelType;
use App\Models\CarMakeTransmission;
use Schema;

trait commonTrait
{

    public function getDropdownOptions($field_id, $search, $key = '', $searchBy = '')
    {
        try {
            $model = $this->getModelTable($field_id);

            if (!$model) {
                return response()->json([]);
            }
            if ($field_id != 'brand_country') {
                $orderbyKey = 'name';
            } else {
                $orderbyKey = 'country_name';
            }

            $query = $model[0]::query()->where('status', '1')->orderBy($orderbyKey, 'asc');

            if ($field_id == 'ad_topic') {
                $query = $query->where('ad_placement_id', $searchBy);
            }

            $key_field = $key != '' ? $key : 'id';

            if (!empty($search)) {
                $query->where($orderbyKey, 'like', "%$search%");
            }
            $data = $query->get([$key_field, $orderbyKey]);

            return response()->json($data);
        } catch (Exception $e) {
            Log::error('ERROR::GET_DROPDOWN_OPTIONS_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function postDropdownOptions($field_id, $name, $extra = '')
    {
        try {
            $model = $this->getModelTable($field_id);
            if (!$model) {
                return response()->json([]);
            }
            $input = ['name' => $name, 'status' => '1'];
            if ($field_id == 'ad_topic') {
                $input['ad_placement_id'] = $extra;
            }
            $data = $model[0]::create($input);
            return response()->json($data);
        } catch (Exception $e) {
            Log::error('ERROR::POST_DROPDOWN_OPTION_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function getModelTable($field_id, $table = false)
    {
        try {
            foreach (commonConstant::CAR_MAKE_DROPDOWN_MODEL as $key => $dropdown_field) {
                if ($key === $field_id) {
                    $model_name = $dropdown_field['model'];
                    return [$model_name];
                }
            }
            return null;
        } catch (Exception $e) {
            Log::error('ERROR::POST_DROPDOWN_OPTION_SEARCH_MODEL_TABLE_DATA, Message: '
                . $e->getMessage() . ' Line No: ' . $e->getLine());
            return null;
        }
    }

    public function fileExists($filePath)
    {
        if (Storage::exists($filePath)) {
            $metaData = Storage::getMetaData($filePath);
            if ($metaData == false) {
                return false;  // It is a directory, not a file
            }
            return true; // It is a file
        }
    }

    public function deleteExistFile($fileName)
    {
        $filePath = storage_path('app\\public\\tempFile\\' . $fileName);

        // Check existence
        if (Storage::disk('public')->exists($filePath)) {
            // Delete
            if (Storage::disk('public')->delete($filePath)) {
                Log::info('File successfully deleted: ' . $filePath);
            } else {
                Log::error('Failed to delete file using Storage::disk(\'public\'): ' . $filePath);
            }
        } else {
            Log::warning('File does not exist: ' . $filePath);
        }

    }

    public function isDropdownAvailable($dbModelName, $name)
    {
        // dd($name);
        try {
            $query = $dbModelName::query();
            $query = $query->where('name', 'like', '%' . $name . '%')->where('status', '1');

            if ($query->count() == 0) {
                $inputs = ['name' => $name, 'status' => '1'];
                if ($dbModelName == 'App\\Models\\CarMakeExteriorColor') {
                    $color = Named::fromString($name);
                    $inputs['color'] = $color->toHex();
                }
                $data = $dbModelName::create($inputs);
            } else {
                $data = $query->first();
            }
            return $data->id;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error(message: 'Error::IMPORT_CAR_MAKE_EXCEL_DATA_IS_DROPDOWN_AVAIL, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return 0;

        }
    }

    public function isBrandAvail($brandName, $country_id)
    {
        try {
            $query = Make::query();
            $country_id = '';
            if (!empty($country_id)) {
                $query = $query->where('country_id', $country_id);
            }
            $query = $query->where('brand_name', 'like', '%' . $brandName . '%');
            if ($query->count() == 0) {
                $carMake = Make::create(['brand_name' => $brandName, 'country_id' => $country_id, 'status' => 1]);
                $isNew = true;
            } else {
                $carMake = $query->first();
                $isNew = false;
            }
            return ['make_id' => $carMake->id, 'isNew' => $isNew];
        } catch (Exception $e) {
            DB::rollBack();
            Log::error(message: 'Error::IMPORT_CAR_MAKE_EXCEL_DATA_IS_BRAND_AVAIL, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return [];
        }
    }

    public function isModelAvail($brand_id, $modelName)
    {
        try {
            $query = Models::query();
            $query = $query->where('brand_id', $brand_id)->where('model_name', 'like', '%' . $modelName . '%')->where('status', '1');
            if ($query->count() == 0) {
                $carModel = Models::create(['model_name' => $modelName, 'brand_id' => $brand_id, 'status' => '1']);
                $isNew = true;
            } else {
                $carModel = $query->first();
                $isNew = false;
            }
            return ['model_id' => $carModel->id, 'isNew' => $isNew];
        } catch (Exception $e) {
            DB::rollBack();
            Log::error(message: 'Error::IMPORT_CAR_MAKE_EXCEL_DATA_IS_MODEL_AVAIL, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return [];
        }
    }

    public function isVariantAvail($brand_id, $model_id, $variantName)
    {
        try {
            $query = Variant::query();
            $query = $query->where('brand_id', $brand_id)->where('model_id', $model_id)->where('variant_name', 'like', '%' . $variantName . '%');
            $isNew = true;
            if ($query->count() == 0) {
                $carVariant = Variant::create(['brand_id' => $brand_id, 'model_id' => $model_id, 'variant_name' => $variantName, 'status' => '1']);
                $isNew = true;
            } else {
                $carVariant = $query->first();
                $isNew = false;
            }
            return ['variant_id' => $carVariant->id, 'isNew' => $isNew];
        } catch (Exception $e) {
            DB::rollBack();
            Log::error(message: 'Error::IMPORT_CAR_MAKE_EXCEL_DATA_IS_VARIANT_AVAIL, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return [];
        }
    }

    public function createCarMake($CarRow)
    {
        try {
            $country = new Country();
            if (!empty($CarRow['COUNTRY MAKE'])) {
                $country = Country::where('country_name', 'like', '%' . $CarRow['COUNTRY MAKE'] . '%')->first();
            }
            $brand = $this->isBrandAvail($CarRow['MAKE'], $country->id) ?? '';
            if (isset($brand['make_id'])) {
                $brand_id = $brand['make_id'];
            }
            $model = $this->isModelAvail($brand_id, $CarRow['MODEL']) ?? '';
            if (isset($model['model_id'])) {
                $model_id = $model['model_id'];
            }
            $variant = $this->isVariantAvail($brand_id, $model_id, $CarRow['VARIANT']) ?? '';
            if (isset($variant['variant_id'])) {
                $variant_id = $variant['variant_id'];
            }
            $carMakeInput = [
                'car_id' => CarMake::generateCode(),
                'brand_id' => $brand_id,
                'brand_country' => $country->id ?? 0,
                'model_id' => $model_id,
                'variant_id' => $variant_id,
                'body_type' => isset($CarRow['BODY TYPE']) ? $this->isDropdownAvailable('App\\Models\\BodyType', $CarRow['BODY TYPE']) : '',
                'transmission' => isset($CarRow['TRANSMISSION']) ? $this->isDropdownAvailable('App\\Models\\CarMakeTransmission', $CarRow['TRANSMISSION']) : '',
                'fuel_type' => isset($CarRow['FUEL TYPE']) ? $this->isDropdownAvailable('App\\Models\\CarMakeFuelType', $CarRow['FUEL TYPE']) : '',
                'drive_train' => isset($CarRow['DRIVETRAIN']) ? $this->isDropdownAvailable('App\\Models\\CarMakeDriveTrain', $CarRow['DRIVETRAIN']) : '',
                'start_year' => isset($CarRow['START YEAR']) ? $CarRow['START YEAR'] : '',
                'end_year' => isset($CarRow['DISCONTINUED YEAR']) ? $CarRow['DISCONTINUED YEAR'] : '',
                'seat' => isset($CarRow['SEAT']) ? $CarRow['SEAT'] : '',
                'exterior_color' => 'null',
                'interior_color' => 'null',
                'consumption' => 'null',
                'no_of_door' => isset($CarRow['NUMBER OF DOORS']) ? $CarRow['NUMBER OF DOORS'] : '',
                'consumption_value_km_l' => 'null',
                'mprs' => isset($CarRow['MRSP']) ? $CarRow['MRSP'] : '',
                'brand_emblem' => '',
            ];
            $CarMakeInsert = CarMake::create($carMakeInput);
            $carEngineInput = [
                'engine_cc' => isset($CarRow['ENGINE CC']) ? $this->isDropdownAvailable('App\\Models\\CarMakeMadeYear', $CarRow['ENGINE CC']) : '',//Model Work
                'engine_type' => isset($CarRow['ENGINE TYPE']) ? $this->isDropdownAvailable('App\\Models\\CarMakeEngineType', $CarRow['ENGINE TYPE']) : '',
                'compression_ratio' => isset($CarRow['COMPRESSION RATIO']) ? $CarRow['COMPRESSION RATIO'] : '',
                'peak_power_kw' => isset($CarRow['PEAK POWER (KW)']) ? $CarRow['PEAK POWER (KW)'] : '',
                'peak_torque_nm' => isset($CarRow['PEAK TORQUE (NM)']) ? $CarRow['PEAK TORQUE (NM)'] : '',
                'car_makes_id' => isset($CarMakeInsert->car_id) ? $CarMakeInsert->car_id : '',
            ];
            CarEngine::create($carEngineInput);
            $carDimensionInputs = [
                'length_mm' => 0,
                'weight_mm' => 0,
                'height_mm' => 0,
                'wheel_base_mm' => 0,
                'kerb_weight_kg' => isset($CarRow['WEIGHT HEIGHT KERB']) ? $CarRow['WEIGHT HEIGHT KERB'] : 0,
                'fuel_tank_ltr' => isset($CarRow['WEIGHT FUEL TANK (LITRES)']) ? $CarRow['WEIGHT FUEL TANK (LITRES)'] : 0,
                'car_make_id' => isset($CarMakeInsert->car_id) ? $CarMakeInsert->car_id : '',
            ];
            CarDiamension::create($carDimensionInputs);
            $carBrakeInput = [
                'brake_front' => isset($CarRow['FRONT BRAKES']) ? $this->isDropdownAvailable('App\\Models\\CarMakeBrake', $CarRow['FRONT BRAKES']) : '',
                'brake_rear' => isset($CarRow['REAR BRAKES']) ? $this->isDropdownAvailable('App\\Models\\CarMakeBrake', $CarRow['REAR BRAKES']) : '',
                'suspension_front' => isset($CarRow['FRONT SUSPENSION']) ? $this->isDropdownAvailable('App\\Models\\CarMakeSuspension', $CarRow['FRONT SUSPENSION']) : '',
                'suspension_back' => isset($CarRow['BACK SUSPENSION']) ? $this->isDropdownAvailable('App\\Models\\CarMakeSuspension', $CarRow['BACK SUSPENSION']) : '',
                'steering' => isset($CarRow['STEERING']) ? $this->isDropdownAvailable('App\\Models\\CarMakeSteering', $CarRow['STEERING']) : '',
                'wheel_type_front' => isset($CarRow['TYPE OF WHEELS FRONT']) ? $CarRow['TYPE OF WHEELS FRONT'] : '',
                'wheel_type_rear' => isset($CarRow['TYPE OF WHEELS REAR']) ? $CarRow['TYPE OF WHEELS REAR'] : '',
                'wheel_type_front_rims' => isset($CarRow['FRONT RIMS']) ? $CarRow['FRONT RIMS'] : '',
                'wheel_type_rear_rims' => isset($CarRow['REAR RIMS']) ? $CarRow['REAR RIMS'] : '',
                'features_equipments' => isset($CarRow['STANDAD FETURES / EQUIPMENTS']) ? $this->isSpecification($CarRow['STANDAD FETURES / EQUIPMENTS']) : '',//specific Function
                'car_make_id' => isset($CarMakeInsert->car_id) ? $CarMakeInsert->car_id : '',
            ];
            CarBrake::create($carBrakeInput);
            $carWarrentyInputs = [
                'manufacturers_warranty' => isset($CarRow["MANUFACTURE'S WARRANTY (YEAR)"]) ? $this->isDropdownAvailable('App\\Models\\CarMakeManufacturersWarranty', $CarRow["MANUFACTURE'S WARRANTY (YEAR)"]) : '',
                'cargurus_warranty' => '',
                'road_tax_amount_rm' => isset($CarRow['ROADTAX AMOUNT PER YEAR']) ? $CarRow['ROADTAX AMOUNT PER YEAR'] : '',
                'road_tax_year' => '',
                'car_make_id' => isset($CarMakeInsert->car_id) ? $CarMakeInsert->car_id : '',
            ];
            CarWarranty::create($carWarrentyInputs);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error::IMPORT_CAR_MAKE_EXCEL_DATA_IS_INSERT, Message: '
                . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function isSpecification($specPlainText)
    {
        try {
            $arrayInputs = array_map('trim', explode(',', $specPlainText));

            $ids = array_map(function ($arrayInput) {
                $feature = Feature::where('feature_name', 'like', '%' . $arrayInput . '%')
                    ->where('status', '1')
                    ->first();

                if (!$feature) {
                    $feature = Feature::create([
                        'feature_name' => $arrayInput,
                        'status' => '1'
                    ]);
                }

                return $feature->id;
            }, $arrayInputs);

            return $ids;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error::IMPORT_CAR_MAKE_EXCEL_DATA_IS_FEATURE_AVAIL, Message: '
                . $e->getMessage() . ' Line No: ' . $e->getLine());
            return [];
        }
    }

    public function isBeautification($car_detail_id)
    {
        try {
            $car = BeautifyManagement::where('car_detail_id', $car_detail_id)->first();
            // dd($car);
            if (!$car) {
                dd('No record found');
            }

            $fields = commonConstant::BEAUTIFY_MANAGEMENTS_FIELDS;

            $hasAny = collect($fields)->contains(fn($field) => filled($car->$field));

            if ($hasAny) {
                // dd('true');
                return true;
            } else {
                // dd('false');
                return false;
            }

        } catch (Exception $e) {
            Log::error('Error::BEAUTIFICATION_FOR_CAR_DETAILS, Message: '
                . $e->getMessage() . ' Line No: ' . $e->getLine());
            return false;
        }
    }

    public function beautifyMediaCount($car_detail_id)
    {
        try {
            $car = BeautifyManagement::where('car_detail_id', $car_detail_id)->first();

            if (!$car) {
                return ['error' => 'No record found'];
            }

            $fieldImages = commonConstant::BEAUTIFY_MANAGEMENTS_IMAGE_FIELDS;
            $fieldVideos = commonConstant::BEAUTIFY_MANAGEMENTS_VIDEO_FIELDS;

            // Count filled image fields
            $imageCount = collect($fieldImages)
                ->filter(fn($field) => filled($car->$field))
                ->count();

            // Count filled video fields
            $videoCount = collect($fieldVideos)
                ->filter(fn($field) => filled($car->$field))
                ->count();

            return [
                'photos' => $imageCount ?? 0,
                'videos' => $videoCount ?? 0,
            ];

        } catch (Exception $e) {
            Log::error('Error::BEAUTIFICATION_FOR_CAR_DETAILS_MEDIA_COUNT, Message: '
                . $e->getMessage() . ' Line No: ' . $e->getLine());
            return false;
        }
    }
    ##send responce codes
        private function sendResponse($result, $message)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $result,
            
        ], 200);
    }

    private function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }



    public function minimumLoan($car_price)
    {
        try {
            $loanTypes = commonConstant::CAR_LOAN_PERCENTAGE;
            foreach ($loanTypes as $loanKey => $loanType) {
                foreach ($loanType as $loan_rule) {
                    $loanAmount = $car_price - ($car_price * 10 / 100);

                    // Calculate total payable
                    $totalPayable = $loanAmount + ($loanAmount * ($loan_rule['interest'] / 100) * $loan_rule['max_tenure']);
                    $months = $loan_rule['max_tenure'] * 12;
                    $monthlyPayment = $totalPayable / $months;

                    // Store with key name
                    $loanList[$loanKey] = [
                        'monthly_payment' => $monthlyPayment, // keep as number for comparison
                        'tenure_years' => $loan_rule['max_tenure'],
                        'interest_rate' => $loan_rule['interest'],
                        'total_loan_amount' => $totalPayable,
                        'loan_after_downpayment' => $loanAmount,
                    ];
                }
            }

            // Find the loan with the least monthly payment
            $minLoanKey = null;
            $minMonthlyPayment = null;

            foreach ($loanList as $key => $loan) {
                if ($minMonthlyPayment === null || $loan['monthly_payment'] < $minMonthlyPayment) {
                    $minMonthlyPayment = $loan['monthly_payment'];
                    $minLoanKey = $key;
                }
            }

            // format the final output
            $bestLoan = $loanList[$minLoanKey];
            $bestLoan['monthly_payment'] = number_format($bestLoan['monthly_payment'], 2);
            $bestLoan['total_loan_amount'] = number_format($bestLoan['total_loan_amount'], 2);
            $bestLoan['loan_after_downpayment'] = number_format($bestLoan['loan_after_downpayment'], 2);

            return $bestLoan;
        } catch (Exception $e) {
            Log::error('Error::BEAUTIFICATION_FOR_CAR_DETAILS_MEDIA_LOAN, Message: '
                . $e->getMessage() . ' Line No: ' . $e->getLine());
            // return false;
        }
    }

    public function fetchPromoCars($data, $promoDiscount, $key = '')
    {

        if ($key == 'filter') {
            $data = json_decode($data, true);
        }
        // dd($data);
        try {
            $query = CarInfo::query()
                ->with([
                    'getCarSelected' => fn($q) => $q->where('is_expired', '!=', 1)
                ])
                ->whereIn('car_info_category', ['A', 'C'])
                ->where('isSold', 0)
                ->where('status', 1);

            // Car category
            if (isset($promoDiscount['car_category']) && $promoDiscount['car_category'] !== 'null') {
                $query->where('car_info_category', $promoDiscount['car_category']);
            }

            // Brand + Model
            if (isset($data['brand_id']) && $data['brand_id'] !== 'null') {
                $query->where('brand_id', $data['brand_id']);
            }
            if (isset($data['model_id']) && $data['model_id'] !== 'null') {
                $query->where('model_id', $data['model_id']);
            }

            // Body Type 
            if (!empty($data['body_type_id']) && $data['body_type_id'] !== 'null') {
                $query->whereHas('getCarMake', fn($q) => $q->where('body_type', $data['body_type_id']));
            }
            if (!empty($data['transmission']) && $data['transmission'] !== 'null') {
                $query->whereHas('getCarMake', fn($q) => $q->where('transmission', $data['transmission']));
            }

            // Fuel type
            if (isset($data['fuel_type_id']) && $data['fuel_type_id'] !== 'null') {
                $FuelType = CarMakeFuelType::find($data['fuel_type_id']);
                if ($FuelType) {
                    $query->where('car_info_fuel_type', $FuelType->name);
                }
            }

            // Price
            if (isset($data['price']) && $data['price'] !== 'null') {
                $price = $data['price'];
                $min = (int) str_replace(',', '', $price[0]);
                $max = (int) str_replace(',', '', $price[1]);
                if ($min !== 0 || $max !== 0) {
                    $query->whereBetween('car_info_price', [$min, $max]);
                }
            }

            // Year
            if (!empty($data['year']) && $data['year'] !== 'null') {
                $year = $data['year'];
                $min = (int) str_replace(',', '', $year[0]);
                $max = (int) str_replace(',', '', $year[1]);

                if (!($min === 0 && $max === 0)) {
                    $query->whereBetween('car_info_car_make_year', [$min, $max]);
                    // dd($query->count());
                }
            }


            // Mileage
            if (isset($data['mileage']) && $data['mileage'] !== 'null') {
                $mileage = $data['mileage'];
                $min = (int) str_replace(',', '', $mileage[0]);
                $max = (int) str_replace(',', '', $mileage[1]);
                if ($min !== 0 || $max !== 0) {
                    $query->whereBetween('mileage', [$min, $max]);
                }
            }

            // color
            // if (isset($data['color']) && $data['color'] !== 'null') {
            //     $query = $query->where('car_info_exterior_color', $data['color']);
            // }

            // center
            if (isset($data['center']) && $data['center'] !== 'null') {
                $query = $query->where('car_info_location', $data['center']);
            }


            // Get matching cars
            $promoCars = $query->get();

            if ($key == 'filter') {
                //Get Count Cars
                $count = $query->count();
                return ['promoResult' => $count];
            }


            if ($promoCars->isEmpty()) {
                return ['promoResult' => collect(), 'transmission_name' => ''];
            }

            $finalResults = collect();

            foreach ($promoCars as $car) {
                // Get unique transmission IDs for this car’s brand+model
                $transmissions = CarMake::where('brand_id', $car->brand_id)
                    ->where('model_id', $car->model_id)
                    ->pluck('transmission')
                    ->unique()
                    ->filter();

                foreach ($transmissions as $transmissionId) {
                    $transmissionName = CarMakeTransmission::where('id', $transmissionId)->value('name');

                    // Prevent duplicate pushes if same combo repeats
                    if (
                        !$finalResults->contains(
                            fn($r) =>
                            $r['car_detail_id'] === $car->car_detail_id &&
                            $r['transmission'] === $transmissionName
                        )
                    ) {
                        $finalResults->push([
                            'car_detail_id' => $car->car_detail_id,
                            'brand_id' => $car->brand_id,
                            'model_id' => $car->model_id,
                            'transmission' => $transmissionName,
                            'car_info_category' => $car->car_info_category,
                            'price' => $car->car_info_price,
                        ]);
                    }
                }
            }

            // dd($finalResults);

            return [
                'promoResult' => $finalResults,
                'count' => $query->count(),
            ];

        } catch (Exception $e) {
            Log::error('Error fetching promo cars: ' . $e->getMessage());
            return [
                'promoResult' => collect(),
                'error' => $e->getMessage(),
            ];
        }
    }
}
