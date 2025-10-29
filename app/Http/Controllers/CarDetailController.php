<?php

namespace App\Http\Controllers;

use App\Constants\commonConstant;
use App\Models\CarDetail;
use App\Models\CarEngine;
use Illuminate\Http\Request;
use App\Models\CarInfo;
use App\Models\CarAccident;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\CarMake;
use App\Models\Country;
use App\Models\BeautifyInspection;
use App\Models\BeautifyManagement;
use Spatie\SimpleExcel\SimpleExcelReader;
use OpenSpout\Common\Entity\Row;
use Illuminate\Support\Facades\Storage;
use App\Traits\commonTrait;
use App\Helpers\CodeGenerator;
use App\Models\Make;
use App\Models\Models;

class CarDetailController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $per_Page = isset($request->per_page) ? $request->per_page : 10;
            $data = CarInfo::with(commonConstant::CAR_DETAIL_RELATIONSHIP_INDEX)->orderBy('id', 'desc')->paginate($per_Page)->appends($request->except('page'));
            // dd($data);
            return view('operations.details.index', compact('data'))
                ->with('i', ($request->input('page', 1) - 1) * $per_Page);
        } catch (Exception $e) {
            Log::error('Error::CREATE_CAR_DETAIL_INDEX, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $countries = Country::where('status', commonConstant::ACTIVE)->get();
            return view('operations.details.create', compact('countries'));
        } catch (Exception $e) {
            Log::error('Error::CREATE_CAR_DETAIL_, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'car_detail_id' => 'required|string',
            'car_info_category' => 'required',
            'car_info_price' => 'required',
            'car_info_location' => 'required',
            'brand_id' => 'required',
            'model_id' => 'required',
            'variant_id' => 'required',
            'car_info_fuel_type' => 'required',
            'car_info_registration_type' => 'required',
            'car_info_registration_number' => 'required',
            'car_info_registration_date' => 'required',
            'car_info_car_make_year' => 'required',
            'car_info_exterior_color' => 'required',
            'interior_color' => 'required',
            'number_of_keys' => 'required',
            'mileage' => 'required',
            'engine_number' => 'required',
            'chassis_number' => 'required',
            'owner' => 'required',
            'usage' => 'required',
            'car_accident' => 'required',
            'flood_car' => 'required',
            'manufacturers_warranty' => 'required',
            'cargurus_warranty' => 'required',
            'inspector_feedback_comment',
            'carguru_spotlight_header_copy',
            'carguru_spotlight_body_copy',
        ]);

        DB::beginTransaction();
        try {
            $carInfo = $request->only([
                'car_detail_id',
                'car_info_category',
                'car_info_price',
                'car_info_location',
                'brand_id',
                'model_id',
                'variant_id',
                'car_info_fuel_type',
                'car_info_registration_type',
                'car_info_registration_number',
                'car_info_registration_date',
                'car_info_car_make_year',
                'car_info_exterior_color',
                'interior_color',
                'number_of_keys',
                'engine_number',
                'chassis_number',
                'mileage',
            ]);
            $info = CarInfo::create($carInfo);

            $carAccident = $request->only([
                'owner',
                'usage',
                'car_accident',
                'flood_car',
                'manufacturers_warranty',
                'cargurus_warranty',
                'road_tax_amount',
                'road_tax_year',
                'inspector_feedback_comment',
                'carguru_spotlight_header_copy',
                'carguru_spotlight_body_copy',
                'voc_document',
                'roadtax_document',
                'picture_of_keys',
                'others'
            ]);
            $carAccident['voc_document'] = $request->file('voc_document') ? $request->file('voc_document')->store('images', 'public') : 'null';//$request->file('voc_document')->store('images', 'public');
            $carAccident['roadtax_document'] = $request->file('roadtax_document') ? $request->file('roadtax_document')->store('images', 'public') : 'null'; //$request->file('roadtax_document')->store('images', 'public');
            $carAccident['picture_of_keys'] = $request->file('picture_of_keys') ? $request->file('picture_of_keys')->store('images', 'public') : 'null'; //$request->file('picture_of_keys')->store('images', 'public');
            $carAccident['others'] = $request->file('others') ? $request->file('others')->store('images', 'public') : 'null'; //$request->file('others')->store('images', 'public');
            $carAccident['road_tax_amount'] = '0';
            $carAccident['road_tax_year'] = '0';
            $carAccident['car_detail_id'] = $info->car_detail_id;


            CarAccident::create($carAccident);
            if ($request->car_info_category == 'A' || $request->car_info_category == 'C') {
                BeautifyManagement::create(['promotion_id' => '', 'car_detail_id' => $info->car_detail_id]);
            }
            BeautifyInspection::create(['promotion_id' => '', 'car_detail_id' => $info->car_detail_id]);

            DB::commit();
            return redirect()->route('car-details.index')->with('success', 'Car Details Created Successfully');

        } catch (Exception $e) {
            DB::rollback();
            Log::error('ERROR::CAR_DETAILS_STORE ' . $e->getMessage() . 'Line No: ' . $e->getLine());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        try {
            $carDetail = CarInfo::with(commonConstant::CAR_DETAIL_RELATIONSHIP_SHOW)->findOrFail($id);
            $countries = Country::where('status', commonConstant::ACTIVE)->get();
            $carAccident = CarAccident::where('car_detail_id', $carDetail->car_detail_id)->first();
            return view('operations.details.edit', compact('carDetail', 'carAccident', 'countries'));
        } catch (Exception $e) {
            Log::error('Error::EDIT_CAR_DETAIL, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'car_detail_id' => 'required',
            'car_info_category' => 'required',
            'car_info_price' => 'required',
            'car_info_location' => 'required',
            'brand_id' => 'required',
            'model_id' => 'required',
            'variant_id' => 'required',
            'car_info_fuel_type' => 'required',
            'car_info_registration_type' => 'required',
            'car_info_registration_number' => 'required',
            'car_info_registration_date' => 'required',
            'car_info_car_make_year' => 'required',
            'car_info_exterior_color' => 'required',
            'interior_color' => 'required',
            'number_of_keys' => 'required',
            'mileage' => 'required',
            'engine_number' => 'required',
            'chassis_number' => 'required',
            'owner' => 'required',
            'usage' => 'required',
            'car_accident' => 'required',
            'flood_car' => 'required',
            'manufacturers_warranty' => 'required',
            'cargurus_warranty' => 'required',
            'inspector_feedback_comment',
            'carguru_spotlight_header_copy',
            'carguru_spotlight_body_copy',
        ]);

        DB::beginTransaction();
        try {
            $carInfoUpdate = $request->only([
                'car_detail_id',
                'car_info_category',
                'car_info_price',
                'car_info_location',
                'brand_id',
                'model_id',
                'variant_id',
                'car_info_fuel_type',
                'car_info_registration_type',
                'car_info_registration_number',
                'car_info_registration_date',
                'car_info_car_make_year',
                'car_info_exterior_color',
                'interior_color',
                'number_of_keys',
                'engine_number',
                'chassis_number',
                'mileage',
            ]);
            $infoUpdate = CarInfo::findOrFail($id);
            $infoUpdate->update($carInfoUpdate);

            $carAccident = $request->only([
                'owner',
                'usage',
                'car_accident',
                'flood_car',
                'manufacturers_warranty',
                'cargurus_warranty',
                'road_tax_amount',
                'road_tax_year',
                'inspector_feedback_comment',
                'carguru_spotlight_header_copy',
                'carguru_spotlight_body_copy',
                'voc_document',
                'roadtax_document',
                'picture_of_keys',
                'others'
            ]);
            $carAccident['voc_document'] = $request->file('voc_document') ? $request->file('voc_document')->store('images', 'public') : 'null';//$request->file('voc_document')->store('images', 'public');
            $carAccident['roadtax_document'] = $request->file('roadtax_document') ? $request->file('roadtax_document')->store('images', 'public') : 'null'; //$request->file('roadtax_document')->store('images', 'public');
            $carAccident['picture_of_keys'] = $request->file('picture_of_keys') ? $request->file('picture_of_keys')->store('images', 'public') : 'null'; //$request->file('picture_of_keys')->store('images', 'public');
            $carAccident['others'] = $request->file('others') ? $request->file('others')->store('images', 'public') : 'null'; //$request->file('others')->store('images', 'public');
            $carAccident['road_tax_amount'] = '0';
            $carAccident['road_tax_year'] = '0';

            CarAccident::where('car_detail_id', $infoUpdate->car_detail_id)->update($carAccident);
            DB::commit();
            return redirect()->route('car-details.index')->with('success', 'Car Details Update Successfully');

        } catch (Exception $e) {
            DB::rollback();
            Log::error('ERROR::CAR_DETAILS_UPDATE ' . $e->getMessage() . 'Line No: ' . $e->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
    }

    public function generateCode($prefix)
    {
        try {
            $code = CodeGenerator::generate($prefix);
            return response()->json(['code' => $code]);
        } catch (Exception $e) {
            Log::error('Error::CAR_DETAIL_CATEGORY_SEARCH_GENERATE_CODE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function importCarDetail(Request $request)
    {
        $this->validate($request, [
            'upload_file' => 'required|mimes:xlsx,csv|max:2048',
        ]);
        DB::beginTransaction();
        try {
            if ($file = $request->file('upload_file')) {
                $fileName = 'CarGuru-Car-Detail-' . date('Ymd_His') . "." . $file->getClientOriginalExtension();

                // Save file
                Storage::disk('public')->putFileAs('tempFile', $request->file('upload_file'), $fileName);

                // Absolute path (for File::exists / File::delete)
                $filePath = storage_path('app/public/tempFile/' . $fileName);

                // Or relative path (for Storage::disk)
                $relativePath = 'tempFile/' . $fileName;

                // dd($filePath);

                if (isset($filePath) && $this->fileExists($filePath) != 'false') {
                    $rows = SimpleExcelReader::create($filePath)
                        // ->useHeaders(['Name','Mobile Number','Email','Password','Locked','Status','Role ID'])
                        ->fromSheetName("CAR DETAIL")->getRows()
                        ->each(function (array $CarRow) {
                            // dd($CarRow);
                            $car_detail_id = '';
                            if (isset($CarRow['Car Category'])) {
                                $categories = [
                                    'As Is Car' => 'A',
                                    'Bid Car' => 'B',
                                    'Certified Car' => 'C',
                                ];

                                if (isset($categories[$CarRow['Car Category']])) {
                                    $carCategory = $categories[$CarRow['Car Category']];
                                    $response = $this->generateCode($carCategory);
                                    $car_detail_id = $response->getData()->code;
                                }
                            }
                            // dd($carCategory);
                            $brand = $this->isBrandAvail($CarRow['Make'], '') ?? '';
                            if (isset($brand['make_id'])) {
                                $brand_id = $brand['make_id'];
                            }
                            // dd($brand);
                            $model = $this->isModelAvail($brand_id, $CarRow['Model']) ?? '';
                            if (isset($model['model_id'])) {
                                $model_id = $model['model_id'];
                            }

                            $variant = $this->isVariantAvail($brand_id, $model_id, $CarRow['Variant']) ?? '';
                            if (isset($variant['variant_id'])) {
                                $variant_id = $variant['variant_id'];
                            }

                            $isAvail = $this->isAvailCarMake($brand_id, $CarRow['Make'], $model_id, $CarRow['Model'], $variant_id, $CarRow['Variant'], $CarRow['FUEL TYPE']);
                            // dd($car_detail_id);
                            if ($isAvail) {
                                $carInfoInput = [
                                    "car_info_category" => $carCategory ?? '',
                                    "car_detail_id" => $car_detail_id ?? '',
                                    "car_info_price" => !empty($CarRow['Car Price']) ? $CarRow['Car Price'] : 0,
                                    "car_info_location" => $this->isDropdownAvailable('App\\Models\\BranchCenter', $CarRow['Location']) ?? '',
                                    "brand_id" => $brand_id ?? '',
                                    "model_id" => $model_id ?? '',
                                    "variant_id" => $variant_id ?? '',
                                    "car_info_fuel_type" => !empty($CarRow['FUEL TYPE']) ? $CarRow['FUEL TYPE'] : '',
                                    "car_info_registration_type" => $this->isDropdownAvailable('App\\Models\\CarDetailRegistrationType', $CarRow['Registration Type']) ?? '',
                                    "car_info_registration_number" => !empty($CarRow['Registration Number']) ? $CarRow['Registration Number'] : '',
                                    "car_info_registration_date" => !empty($CarRow['Registration Date']) ? $CarRow['Registration Date'] : '',
                                    "car_info_car_make_year" => !empty($CarRow['Car Make Year']) ? $CarRow['Car Make Year'] : '',
                                    "car_info_exterior_color" => $this->isDropdownAvailable('App\\Models\\CarMakeExteriorColor', $CarRow['Exterior Color']) ?? '',
                                    "interior_color" => '',
                                    "engine_number" => !empty($CarRow['Engine Number']) ? $CarRow['Engine Number'] : '',
                                    "chassis_number" => !empty($CarRow['Chsesis Number']) ? $CarRow['Chsesis Number'] : '',
                                    "mileage" => !empty($CarRow['Mileage']) ? $CarRow['Mileage'] : '',
                                    'number_of_keys' => !empty($CarRow['Number of Keys']) ? $CarRow['Number of Keys'] : 0,
                                ];

                                $CarAccidentInput = [
                                    "car_detail_id" => $car_detail_id,
                                    "owner" => !empty($CarRow['Owner']) ? $CarRow['Owner'] : '',
                                    "usage" => !empty($CarRow['Usage']) ? $CarRow['Usage'] : '',
                                    "car_accident" => !empty($CarRow['Car Accident']) ? $CarRow['Car Accident'] : '',
                                    "flood_car" => !empty($CarRow['Flood Car']) ? $CarRow['Flood Car'] : '',
                                    'manufacturers_warranty' => '',
                                    'cargurus_warranty' => '',
                                    'road_tax_amount' => !empty($CarRow['RaodTax']) ? $CarRow['RaodTax'] : '',
                                    'road_tax_year' => '',// removed
                                    'inspector_feedback_comment' => '',
                                    'carguru_spotlight_header_copy' => !empty($CarRow['Carguru Sportlight - Header']) ? $CarRow['Carguru Sportlight - Header'] : '',
                                    'carguru_spotlight_body_copy' => !empty($CarRow['Carguru Sportlight - Body']) ? $CarRow['Carguru Sportlight - Body'] : '',
                                    'voc_document' => '',
                                    'roadtax_document' => '',
                                    'picture_of_keys' => '',
                                    'others' => ''
                                ];
                                // dd($carInfoInput);
                                CarInfo::create($carInfoInput);
                                CarAccident::create($CarAccidentInput);
                                // BeautifyInspection::create(['promotion_id' => '', 'car_detail_id' => $car_detail_id]);
                                // BeautifyManagement::create(['promotion_id' => '', 'car_detail_id' => $car_detail_id]);
                            } else {
                                DB::rollBack();
                                Log::error('ERROR::CAR_DETAILS_IMPORT_CAR_MAKE_AVAIL_FALSE');
                            }
                        });
                    DB::commit();
                    // Check existence before delete
                    if (Storage::disk('public')->exists($relativePath)) {
                        Log::info('File exists: ' . $relativePath);
                        $this->deleteExistFile($fileName);

                    } else {
                        Log::warning('File not found for deletion: ' . $relativePath);
                    }
                    return redirect()->route('car-details.index')->with('success', 'Car Detail Excel has Upload been successfully.');
                } else {
                    DB::rollBack();
                    return redirect()->back()->withErrors('File Path Does Not Matched!');
                }
            }
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('ERROR::CAR_DETAILS_IMPORT ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function isAvailCarMake($brand_id, $brandName, $model_id, $modelName, $variant_id, $variantName, $fuel_type)
    {
        try {
            $query = CarMake::query();
            $query = $query->where('brand_id', $brand_id)->where('model_id', $model_id)->where('variant_id', $variant_id);
            if ($query->count() == 0) {
                $carMake = ['MAKE' => $brandName, 'MODEL' => $modelName, 'VARIANT' => $variantName, 'FUEL TYPE' => $fuel_type ?? ''];
                $this->createCarMake($carMake);
            }
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error(message: 'Error::IMPORT__CAR_DETAIL_CAR_MAKE_EXCEL_DATA_IS_MMV_AVAIL, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return false;
        }
    }

    public function getCarMake(Request $request)
    {
        try {
            $search = $request->q;
            if (isset($search)) {
                $brands = CarMake::select('brand_id')
                    ->distinct()
                    ->with(['brand:id,brand_name'])
                    ->whereHas('brand', function ($q) use ($search) {
                        $q->where('brand_name', 'LIKE', "%{$search}%");
                    })
                    ->get()
                    ->map(function ($item) {
                        return [
                            'brand_id' => $item->brand_id,
                            'brand_name' => $item->brand?->brand_name,
                        ];
                    })
                    ->values();
            } else {
                $brands = CarMake::select('brand_id')
                    ->distinct()
                    ->with(['brand:id,brand_name'])
                    ->get()
                    ->map(function ($item) {
                        return [
                            'brand_id' => $item->brand_id,
                            'brand_name' => $item->brand?->brand_name, // safe null check
                        ];
                    })
                    ->values();
            }

            return $brands;
        } catch (Exception $e) {
            Log::error(message: 'Error::IMPORT__CAR_DETAIL_CAR_MAKE_DATA_IS_MMV_AVAIL, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());

        }
    }
}
