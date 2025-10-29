<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Traits\commonTrait;
use App\Helpers\CodeGenerator;
use App\Constants\commonConstant;
use App\Models\CarDetail;
use App\Models\CarEngine;
use App\Models\CarInfo;
use App\Models\CarAccident;
use Illuminate\Support\Facades\DB;
use App\Models\CarMake;
use App\Models\Country;
use App\Models\BeautifyInspection;
use App\Models\BeautifyManagement;
use Spatie\SimpleExcel\SimpleExcelReader;

class CarInTakeManagementController extends Controller
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
            return view('operations.car_in_take_management.index', compact('data'))
                ->with('i', ($request->input('page', 1) - 1) * $per_Page);
        } catch (Exception $e) {
            Log::error('Error::C_MANAGEMENT, Message: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while fetching Car Valuation.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('operations.customer_management.create');
        } catch (Exception $e) {
            Log::error('Error::CUSTOMER_MANAGEMENT, Message: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while fetching Car Valuation.');
        }
    }

    /**

     * Store a newly created resource in storage.
     */

    public function activities()
    {
        try {

            return view('operations.customer_management.activities');
        } catch (Exception $e) {
            Log::error('Error::CUSTOMER_MANAGEMENT, Message: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while fetching Car Valuation.');
        }
    }
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
