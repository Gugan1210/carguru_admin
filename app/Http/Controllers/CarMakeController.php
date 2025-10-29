<?php

namespace App\Http\Controllers;

use App\Constants\commonConstant;
use App\Models\BodyType;
use App\Models\CarBrake;
use App\Models\CarDiamension;
use App\Models\CarEngine;
use App\Models\CarWarranty;
use App\Models\Country;
use App\Models\Models;
use App\Models\Variant;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\CarMake;
use App\Models\Feature;
use App\Models\Make;
use Illuminate\Support\Facades\DB;
use Spatie\SimpleExcel\SimpleExcelReader;
use OpenSpout\Common\Entity\Row;
use Illuminate\Support\Facades\Storage;
use App\Traits\commonTrait;


class CarMakeController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $per_Page = isset($request->per_page) ? $request->per_page : 10;
            $data = CarMake::with(commonConstant::CAR_MAKE_RELATIONSHIP_INDEX)
                ->orderByDesc('id')
                ->paginate($per_Page)
                ->appends($request->except('page'));
            return view('cars.makes.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $per_Page);
        } catch (Exception $e) {
            Log::error('Error::GET_CAR_MAKE_, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $countries = Country::where('status', '1')->get();
            return view('cars.makes.create', compact('countries'));
        } catch (Exception $e) {
            Log::error('Error::CREATE_CAR_MAKE_, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [

            'brand_id' => 'required|numeric',
            'brand_country' => 'required|integer',
            'model_id' => 'required|numeric',
            'variant_id' => 'required|numeric',
            'body_type' => 'required|numeric',
            // 'brand_emblem' => 'required',
            'transmission' => 'required|numeric|max:50',
            'fuel_type' => 'required|numeric|max:50',
            'drive_train' => 'required|numeric',
            'start_year' => 'required|numeric',
            'end_year' => 'required|numeric',
            'seat' => 'required|numeric',
            // 'exterior_color' => ['required', 'string'],
            // 'interior_color' => ['required', 'string'],
            'consumption' => 'required|numeric',
            'no_of_door' => 'required',
            'consumption_value_km_l' => 'required|numeric',
            'mprs' => 'required',

            // 'engine_cc' => 'required|numeric',
            // 'engine_type' => 'required|numeric',
            // 'compression_ratio' => 'required|numeric',
            // 'peak_power_kw' => 'required|numeric',
            // 'peak_torque_nm' => 'required|numeric',

            // 'length_mm' => 'required|numeric',
            // 'weight_mm' => 'required|numeric',
            // 'height_mm' => 'required|numeric',
            // 'wheel_base_mm' => 'required|numeric',
            // 'kerb_weight_kg' => 'required|numeric',
            // 'fuel_tank_ltr' => 'required|numeric',

            // 'brake_front' => 'required|numeric',
            // 'brake_rear' => 'required|numeric',
            // 'suspension_front' => 'required|numeric',
            // 'suspension_back' => 'required|numeric',
            // 'steering' => 'required|numeric',
            // 'wheel_type_front' => 'required',
            // 'wheel_type_rear' => 'required',
            // 'wheel_type_front_rims' => 'required',
            // 'wheel_type_rear_rims' => 'required',
            // 'features_equipments' => 'required|array',

            // 'manufacturers_warranty' => 'required|numeric',
            // 'cargurus_warranty' => 'required|numeric',
            // 'road_tax_amount_rm' => 'required|numeric',
            // 'road_tax_year' => 'required|numeric'
        ]);

        DB::beginTransaction();
        try {
            if ($request->emblem_check) {
                $driveTrain = Make::findOrFail($request->brand_id);
                $imagePath = $request->file('brand_emblem')->store('images', 'public');
                $driveTrain->update(['logo' => $imagePath]);
            }

            $makeData = $request->only([
                'brand_id',
                'brand_country',
                'model_id',
                'variant_id',
                'brand_emblem',
                'transmission',
                'fuel_type',
                'drive_train',
                'start_year',
                'end_year',
                'seat',
                // 'exterior_color',
                // 'interior_color',
                'consumption',
                'no_of_door',
                'consumption_value_km_l',
                'mprs',
                'body_type'
            ]);
            $makeData['exterior_color'] = 'null';
            $makeData['interior_color'] = 'null';
            $makeData['brand_emblem'] = 'null'; //$request->file('brand_emblem')->store('images', 'public');
            $makeData['car_id'] = CarMake::generateCode();
            $carMake = CarMake::create($makeData);
            $engine = $request->only([
                'engine_cc',
                'engine_type',
                'compression_ratio',
                'peak_power_kw',
                'peak_torque_nm',
            ]);
            $engine['car_makes_id'] = $makeData['car_id'];
            $carEngine = CarEngine::create($engine);
            $dimension = $request->only([
                'length_mm',
                'weight_mm',
                'height_mm',
                'wheel_base_mm',
                'kerb_weight_kg',
                'fuel_tank_ltr',
            ]);
            $dimension['car_make_id'] = $makeData['car_id'];
            $carDimension = CarDiamension::create($dimension);
            $brake = $request->only([
                'brake_front',
                'brake_rear',
                'suspension_front',
                'suspension_back',
                'steering',
                'wheel_type_front',
                'wheel_type_rear',
                'wheel_type_front_rims',
                'wheel_type_rear_rims',
            ]);
            $brake['car_make_id'] = $makeData['car_id'];
            $brake['features_equipments'] = json_encode($request->features_equipments);

            $carBrake = CarBrake::create($brake);
            $warranty = $request->only([
                'manufacturers_warranty',
                'cargurus_warranty',
                'road_tax_amount_rm',
            ]);
            $warranty['road_tax_year'] = '0';
            $warranty['car_make_id'] = $makeData['car_id'];
            $carWarranty = CarWarranty::create($warranty);

            DB::commit();
            return redirect()->route('carmakes.index')->with('success', 'Car Make Created Successfully');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error::STORE_CAR_MAKE_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = CarMake::with(commonConstant::CAR_MAKE_RELATIONSHIP_SHOW)->findOrFail($id);
            return view('cars.makes.show', compact('data'));
        } catch (Exception $e) {
            Log::error('Error::SHOW_CAR_MAKE_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $dropDown = [
                'countries' => Country::where('status', '1')->get(),
            ];
            $carMake = CarMake::with(commonConstant::CAR_MAKE_RELATIONSHIP_SHOW)->findOrFail($id);
            return view('cars.makes.edit', compact('carMake', 'dropDown'));
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_EDIT, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [

            'brand_id' => 'required|numeric',
            'brand_country' => 'required|integer',
            'model_id' => 'required|numeric',
            'variant_id' => 'required|numeric',
            'body_type' => 'required|numeric',
            // 'brand_emblem' => 'required',
            'transmission' => 'required|numeric|max:50',
            'fuel_type' => 'required|numeric|max:50',
            'drive_train' => 'required|numeric',
            'start_year' => 'required|numeric',
            'end_year' => 'required|numeric',
            'seat' => 'required|numeric',
            // 'exterior_color' => ['required', 'string'],
            // 'interior_color' => ['required', 'string'],
            'consumption' => 'required|numeric',
            'no_of_door' => 'required',
            'consumption_value_km_l' => 'required|numeric',
            'mprs' => 'required',

            // 'engine_cc' => 'required|numeric',
            // 'engine_type' => 'required|numeric',
            // 'compression_ratio' => 'required|numeric',
            // 'peak_power_kw' => 'required|numeric',
            // 'peak_torque_nm' => 'required|numeric',

            // 'length_mm' => 'required|numeric',
            // 'weight_mm' => 'required|numeric',
            // 'height_mm' => 'required|numeric',
            // 'wheel_base_mm' => 'required|numeric',
            // 'kerb_weight_kg' => 'required|numeric',
            // 'fuel_tank_ltr' => 'required|numeric',

            // 'brake_front' => 'required|numeric',
            // 'brake_rear' => 'required|numeric',
            // 'suspension_front' => 'required|numeric',
            // 'suspension_back' => 'required|numeric',
            // 'steering' => 'required|numeric',
            // 'wheel_type_front' => 'required',
            // 'wheel_type_rear' => 'required',
            // 'wheel_type_front_rims' => 'required',
            // 'wheel_type_rear_rims' => 'required',
            // 'features_equipments' => 'required|array',

            // 'manufacturers_warranty' => 'required|numeric',
            // 'cargurus_warranty' => 'required|numeric',
            // 'road_tax_amount_rm' => 'required|numeric',
            // 'road_tax_year' => 'required|numeric'
        ]);

        DB::beginTransaction();
        try {
            if ($request->emblem_check) {
                $driveTrain = Make::findOrFail($request->brand_id);
                $imagePath = $request->file('brand_emblem')->store('images', 'public');
                $driveTrain->update(['logo' => $imagePath]);
            }

            $makeData = $request->only([
                'brand_id',
                'brand_country',
                'model_id',
                'variant_id',
                'brand_emblem',
                'transmission',
                'fuel_type',
                'drive_train',
                'start_year',
                'end_year',
                'seat',
                // 'exterior_color',
                // 'interior_color',
                'consumption',
                'no_of_door',
                'consumption_value_km_l',
                'mprs',
                'body_type',
            ]);
            $makeData['exterior_color'] = 'null';
            $makeData['interior_color'] = 'null';
            $makeData['brand_emblem'] = 'null'; //$request->file('brand_emblem')->store('images', 'public');
            $makeModify = CarMake::findOrFail($id);
            $makeModify->update($makeData);
            $engine = $request->only([
                'engine_cc',
                'engine_type',
                'compression_ratio',
                'peak_power_kw',
                'peak_torque_nm',
            ]);
            $carEngine = CarEngine::where('car_makes_id', $makeModify->car_id)->update($engine);
            $dimension = $request->only([
                'length_mm',
                'weight_mm',
                'height_mm',
                'wheel_base_mm',
                'kerb_weight_kg',
                'fuel_tank_ltr',
            ]);
            $carDimension = CarDiamension::where('car_make_id', $makeModify->car_id)->update($dimension);
            $brake = $request->only([
                'brake_front',
                'brake_rear',
                'suspension_front',
                'suspension_back',
                'steering',
                'wheel_type_front',
                'wheel_type_rear',
                'wheel_type_front_rims',
                'wheel_type_rear_rims',
            ]);

            $brake['features_equipments'] = json_encode($request->features_equipments);

            $carBrake = CarBrake::where('car_make_id', $makeModify->car_id)->update($brake);
            $warranty = $request->only([
                'manufacturers_warranty',
                'cargurus_warranty',
                'road_tax_amount_rm',
            ]);
            $warranty['road_tax_year'] = '0';

            $carWarranty = CarWarranty::where('car_make_id', $makeModify->car_id)->update($warranty);

            DB::commit();
            return redirect()->route('carmakes.index')->with('success', 'Car Make Update Successfully');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error::UPDATE_CAR_MAKE_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getFeature(Request $request)
    {
        try {
            $search = $request->q;
            $features = Feature::where('feature_name', 'like', "%{$search}%")->orderBy('feature_name', 'asc')
                ->get(['id', 'feature_name']);


            return $features->map(function ($item) {
                return [
                    'id' => $item->id,
                    'text' => $item->feature_name
                ];
            });
        } catch (Exception $e) {
            Log::error('Error::FEATURE_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function postFeature(Request $request)
    {
        try {
            $feature = Feature::create([
                'feature_name' => $request->feature_name,
                'status' => '1'
            ]);

            return response()->json([
                'id' => $feature->id,
                'text' => $feature->feature_name
            ]);
        } catch (Exception $e) {
            Log::error(message: 'Error::FEATURE_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function getFuelType(Request $request)
    {
        try {
            $fuel_type_id = CarMake::with('getFuelType')->where('brand_id', $request->make)->where('model_id', $request->model)->where('variant_id', $request->variant)->first();
            // dd($fuel_type_id);
            return [
                'fuel_type' => $fuel_type_id->getFuelType->name,
            ];
        } catch (Exception $e) {
            Log::error(message: 'Error::GET_FUEL_TYPE_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function importCarMake(Request $request)
    {
        $this->validate($request, [
            'upload_file' => 'required|mimes:xlsx,csv|max:2048',
        ]);
        DB::beginTransaction();
        try {
            if ($file = $request->file('upload_file')) {
                $fileName = 'CarGuru-Car-Make-' . date('Ymd_His') . "." . $file->getClientOriginalExtension();

                Storage::disk('public')->putFileAs('tempFile', $request->file('upload_file'), $fileName);
                $filePath = storage_path('app\\public\\tempFile\\' . $fileName);
                // dd($filePath);

                if (isset($filePath) && $this->fileExists($filePath) != 'false') {
                    $rows = SimpleExcelReader::create($filePath)
                        // ->useHeaders(['Name','Mobile Number','Email','Password','Locked','Status','Role ID'])
                        ->fromSheetName("MAKE")->getRows()
                        ->each(function (array $CarRow) {
                            // dd($CarRow);
                            $this->createCarMake($CarRow);
                        });
                    DB::commit();
                    $this->deleteExistFile($filePath);
                    return redirect()->route('carmakes.index')->with('success', 'Car Make Excel has Upload been successfully.');
                } else {
                    DB::rollBack();
                    return redirect()->back()->withErrors('File Path Does Not Matched!');
                }
            }
        } catch (Exception $e) {
            DB::rollBack();
            Log::error(message: 'Error::IMPORT_CAR_MAKE_EXCEL_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return redirect()->back()->withErrors('Something went Wrong, Please Contact your Admin!');
        }
    }
}
