<?php

namespace App\Http\Controllers;
use App\Models\CarValuation;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\CarValidation;

class CarValuationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $per_Page = isset($request->per_page) ? $request->per_page : 10;
            $data = CarValidation::paginate($per_Page);
            return view('cars.car_valuation.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * 10);
        } catch (Exception $e) {
            Log::error('Error::CAR_VALUATION, Message: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while fetching Car Valuation.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('cars.car_valuation.create');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_VALIDATION_CREATE, Message: ' . $e->getMessage());
            return back()->with('error', 'Failed to load suspension create page.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            "brand_id" => "required",
            "model_id" => "required",
            "msrp" => "required",
            "platform_discount" => "required",
            "base_mileage_per_year" => "required",
            "car_depreciation" => 'required',
            "other_aging_depreciation" => 'required',
            "no_accident" => "required",
            "minor_accidend" => "required",
            "major_accident" => "required",
            "severe_flooding" => "required",
        ]);

        try {
            $inputs = $request->all();
            $inputs['car_depreciation'] = json_encode($request->car_depreciation);
            $inputs['other_aging_depreciation'] = json_encode($request->other_aging_depreciation);
            CarValidation::create($inputs);
            return redirect()->route('car_valuation.index')
                ->with('success', 'Car Validation created successfully');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_VALIDATION_STORE, Message: ' . $e->getMessage());
            return back()->with('error', 'Failed to load suspension create page.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $valuation = CarValidation::findOrFail($id);
            return view('cars.car_valuation.edit', compact('valuation'));
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_VALIDATION_EDIT, Message: ' . $e->getMessage());
            return back()->with('error', 'Failed to load suspension create page.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            "brand_id" => "required",
            "model_id" => "required",
            "msrp" => "required",
            "platform_discount" => "required",
            "base_mileage_per_year" => "required",
            "car_depreciation" => 'required',
            "other_aging_depreciation" => 'required',
            "no_accident" => "required",
            "minor_accidend" => "required",
            "major_accident" => "required",
            "severe_flooding" => "required",
        ]);

        try {
            $inputs = $request->all();
            $inputs['car_depreciation'] = json_encode($request->car_depreciation);
            $inputs['other_aging_depreciation'] = json_encode($request->other_aging_depreciation);
            $Valuation = CarValidation::find($id);
            $Valuation->update($inputs);
            return redirect()->route('car_valuation.index')
                ->with('success', 'Car Validation Updated successfully');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_VALIDATION_STORE, Message: ' . $e->getMessage());
            return back()->with('error', 'Failed to load suspension create page.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
