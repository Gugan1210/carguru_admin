<?php

namespace App\Http\Controllers;

use App\Models\BeautifyInspection;
use App\Models\BeautifyManagement;
use App\Models\BodyType;
use App\Models\CarMakeFuelType;
use App\Models\CarMakeTransmission;
use App\Models\PromoDiscount;
use App\Traits\commonTrait;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\CarDetailCategory;
use App\Models\PromosInput;
use App\Models\CarInfo;
use App\Models\CarMake;
use App\Models\CarSelectedPromos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class PromosDiscountController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // Update expired promotions automatically
            PromoDiscount::checkExpiredPromos();

            // Get all active promotions
            // $active = PromoDiscount::activePromos();

            // Get all expired ones
            // $expired = PromoDiscount::expiredPromos();
            $per_Page = isset($request->per_page) ? $request->per_page : 5;
            $data = PromoDiscount::orderBy('id', 'desc')->paginate($per_Page);
            return view('marketing.promo_discounts.index', compact('data'))
                ->with('i', ($request->input('page', 1) - 1) * 10);
        } catch (Exception $e) {
            Log::error('Error::CAR_PROMO_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $carCategory = CarDetailCategory::where('status', 1)->get();
            $promotion_id = $this->generatePromotionId();
            return view('marketing.promo_discounts.create', compact('carCategory', 'promotion_id'));
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_SUSPENSION_INDEX, Message: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while fetching suspensions.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'promotion_id' => 'required',
            'promotion_name' => 'required|string|max:255|unique:promos_discounts,promotion_name',
            'promotion_detail' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'car_category' => 'required',
            // 'registration_number' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['shortlist_car_promo_input'] = 'null';
            $input['car_detail_id_promo'] = 'null';

            if (isset($request->registration_number)) {
                $registration_number_array = Str::of($request->registration_number)->replace(['<'], ',')->explode(',');
                $input['registration_number'] = json_encode($registration_number_array);
                $this->saveRegistrationNumberPromo($request, $registration_number_array);
                $registerNumberCount = is_countable($registration_number_array) ? count($registration_number_array) : 0;
            }

            $promoDiscount = PromoDiscount::create($input);
            $promoInput = PromosInput::where('promotion_id', $request->promotion_id)->first();
            // dd($promoInput);
            if (isset($promoInput)) {
                $promoCars = $this->fetchPromoCars($promoInput, $promoDiscount);
                // dd($promoCars);
                if (isset($promoCars['promoResult'])) {
                    foreach ($promoCars['promoResult'] as $promoCar) {
                        // dd($promoCar['car_detail_id']);
                        $isAvailCar = CarSelectedPromos::where('car_detail_id', $promoCar['car_detail_id'])->where('is_expired', 0)->count();
                        // dd($isAvailCar);
                        if ($isAvailCar == 0) {
                            $inputPromo = ['promotion_id' => $promoInput->promotion_id, 'car_detail_id' => $promoCar['car_detail_id'], 'transmission' => $promoCar['transmission'], 'is_expired' => 0];
                            CarSelectedPromos::create($inputPromo);
                        }
                    }
                    $this->isAvailSelectedCar($request->promotion_id);

                } else {
                    DB::rollBack();
                    return response()->json([
                        'success' => true,
                        'message' => 'Promos & Discounts Filter No Data',
                    ], 200);
                }
            }
            $this->setSelectCarCount($request->promotion_id);
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Promos & Discounts Created Succussfully',
            ], 200);

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error::CAR_PROMO_CREATE_STORE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PromoDiscount $promoDiscount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $promoDiscount = PromoDiscount::with('carCategory')->findOrFail($id);
            $carCategory = CarDetailCategory::where('status', 1)->get();
            $promoCars = CarSelectedPromos::with('carDetail')->where('promotion_id', $promoDiscount->promotion_id)->paginate(10);
            // dd($promoCars);
            return view('marketing.promo_discounts.edit', compact('carCategory', 'promoDiscount', 'promoCars'));
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_SUSPENSION_INDEX, Message: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while fetching suspensions.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'promotion_id' => 'required',
            'promotion_name' => 'required',
            'promotion_detail' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        try {
            $PromoDiscount = PromoDiscount::findOrFail($id);
            $inputs = $request->all();
            $registration_number_array = Str::of($request->registration_number)->replace(['<'], ',')->explode(',');
            $inputs['registration_number'] = json_encode($registration_number_array);
            $PromoDiscount->update($inputs);
            if ($inputs['registration_number'] != $PromoDiscount->registration_number) {
                $this->saveRegistrationNumberPromo($request, $registration_number_array);
            }
            return redirect()->route('promo_discounts.index')->with('success', 'Promo Discount updated successfully.');
        } catch (Exception $e) {
            Log::error('Error::PROMOS_DISCOUNTS_UPDATE, Message: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while fetching suspensions.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PromoDiscount $promoDiscount)
    {
        //
    }

    function generatePromotionId()
    {
        try {
            $datePart = now()->format('ymd');

            // Find last promotion for today
            $lastPromotion = PromoDiscount::whereDate('created_at', now()->toDateString())
                ->orderBy('promotion_id', 'desc')
                ->first();

            if ($lastPromotion) {
                $lastNumber = (int) substr($lastPromotion->promotion_id, -5);
                $nextNumber = str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);
            } else {
                $nextNumber = '00001';
            }

            $nextPromotionId = "P{$datePart}-{$nextNumber}";
            return $nextPromotionId;
        } catch (Exception $e) {
            Log::error('Error::CAR_PROMO_ID_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function filterInput(Request $request)
    {
        $this->validate($request, [
            'promotion_id' => 'required|string|max:255|unique:promos_discounts_inputs,promotion_id'
        ]);

        try {
            $inputs = $request->all();
            $inputs['price'] = $request->price != 'null' ? json_encode($request->price) : $request->price;
            $inputs['year'] = $request->year != 'null' ? json_encode($request->year) : $request->year;
            $inputs['mileage'] = $request->mileage != 'null' ? json_encode($request->mileage) : $request->mileage;
            // dd($inputs);
            PromosInput::create($inputs);
            return response()->json([
                'message' => 'Input Saved Successfully'
            ], 200);
        } catch (Exception $e) {
            Log::error('Error::CAR_PROMO_FILTER_INPUT_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function saveRegistrationNumberPromo($request, $registration_number_array)
    {
        try {
            foreach ($registration_number_array as $registerNumber) {
                $carDetail = CarInfo::where('car_info_registration_number', $registerNumber)->first();
                if (isset($carDetail) && $carDetail->car_info_category != 'B' && $carDetail->isSold != 1) {
                    $carMake = CarMake::where('brand_id', $carDetail->brand_id)->where('model_id', $carDetail->model_id)->where('variant_id', $carDetail->variant_id)->first();
                    $transmissionData = isset($carMake) ? $carMake->getTransmission->name : 'null';
                    $CarInputs = ['promotion_id' => $request->promotion_id, 'car_detail_id' => $carDetail->car_detail_id, 'transmission' => $transmissionData];
                    $isAvailCar = CarSelectedPromos::where('car_detail_id', $carDetail->car_detail_id)->where('is_expired', 0)->count();
                    if ($isAvailCar == 0) {
                        $carRegisterNumber = CarSelectedPromos::create($CarInputs);
                    }
                }
            }

            return $carRegisterNumber;
        } catch (Exception $e) {
            Log::error(message: 'Error::CAR_PROMO_REGISTRATION_NUMBER_CAR_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return false;
        }
    }

    public function setSelectCarCount($promotion_id)
    {
        try {
            $carCount = CarSelectedPromos::where('promotion_id', $promotion_id)->count();
            PromoDiscount::where('promotion_id', $promotion_id)->update(['count' => $carCount]);
        } catch (Exception $e) {
            Log::error('Error::CAR_PROMO_SELECTED_CAR_DELETE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function deleteCarSelected(string $id)
    {
        try {
            $deleteCar = CarSelectedPromos::findOrFail($id);

            $promoDiscountId = $deleteCar->id; // FK in your table

            $deleteCar->delete();

            $this->setSelectCarCount($deleteCar->promotion_id);
            return redirect()
                ->route('promo_discounts.edit', $promoDiscountId)
                ->with('success', 'Promo Discount Car Deleted successfully.');
        } catch (Exception $e) {
            Log::error('Error::CAR_PROMO_SELECTED_CAR_DELETE, Message: '
                . $e->getMessage()
                . ' Line No: '
                . $e->getLine());
        }
    }

    public function updatePromoStatus(Request $request)
    {

        // dd($request);
        try {
            $promotion = PromoDiscount::where('promotion_id', $request->promotion_id)->first();
            $promotion->status = $request->status;
            $promotion->save();

            return ['message' => 'Promotion Status Updated Successfully'];
        } catch (Exception $e) {
            Log::error(message: 'Error::CAR_PROMO_UPDATE_STATUS_CAR_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function updatePromoApprove(Request $request)
    {

        // dd($request);
        try {
            $promotion = PromoDiscount::where('promotion_id', $request->promotion_id)->first();
            $promotion->is_approved = $request->is_approved;
            $promotion->save();

            return ['message' => 'Promotion Approve Updated Successfully', 'status' => 200];
        } catch (Exception $e) {
            Log::error(message: 'Error::CAR_PROMO_UPDATE_STATUS_CAR_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function isAvailSelectedCar($promotion_id)
    {
        try {
            $carCount = CarSelectedPromos::where('promotion_id', $promotion_id)->count();
            if ($carCount == 0) {
                DB::rollBack();
                PromosInput::where('promotion_id', $promotion_id)->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'Selected Car On Another Promotions',
                ], 200);
            }
        } catch (Exception $e) {
            DB::rollBack();
            Log::error(message: 'Error::CAR_PROMO_SELECTED_IS_AVAIL, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function filterCount(Request $request)
    {
        try {
            $data = [
                'brand_id' => $request->brand_id,
                'model_id' => $request->model_id,
                'fuel_type_id' => $request->fuel_type_id,
                'body_type_id' => $request->body_type_id,
                'price' => $request->price,
                'year' => $request->year,
                'transmission' => $request->transmission,
                'mileage' => $request->mileage,
                'color' => $request->color,
                'center' => $request->center
            ];
            $data = json_encode($data);
            $promoDiscount['car_category'] = $request->promotion_category;
            // dd($data);
            $countCars = $this->fetchPromoCars($data, $promoDiscount, 'filter');
            return $countCars;
        } catch (Exception $e) {
            Log::error(message: 'Error::CAR_PROMO_SELECTED_IS_AVAIL_COUNT, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
}
