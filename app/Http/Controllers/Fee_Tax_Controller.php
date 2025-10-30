<?php

namespace App\Http\Controllers;
use App\Models\Fee_Tax;
use Illuminate\Http\Request;
use App\Traits\commonTrait;
use Illuminate\Support\Facades\Log;
use Exception;

class Fee_Tax_Controller extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('marketing.price-fee-finance.fee_tax.create');

        } catch (Exception $e) {
            Log::error('ERROR::INDEX_CAR_MAKE_ COMMITION' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'booking_amount'              => $request->booking_amount,
            'handling_fee'                => $request->handling_fee ?? [],
            'inspection_fee'              => $request->inspection_fee ?? [],
            'platform_fee'                => $request->platform_fee ?? [],
            'platform_fee_more_than'      => $request->platform_fee_more_than,
            'platform_fee_chargeable_fee' => $request->platform_fee_chargeable_fee,
            'dealers_fee'                 => $request->dealers_fee ?? [],
            'other_type_fee'              => $request->other_type_fee,
            'other_type_amount'           => $request->other_type_amount,
            'others_fee'                  => $request->others_fee ?? [],
            'tax_fee'                     => $request->tax_fee ?? [],
        ];

        $fee_tax = Fee_Tax::create($data);

        return response()->json([
            'success' => true,
            'id'      => $fee_tax->id,
            'message' => 'Fee & Tax settings saved successfully',
            'data'    => $fee_tax
        ]);
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
        $fee_tax = Fee_Tax::findOrFail($id);

        $data = [
            'booking_amount'              => $request->booking_amount,
            'handling_fee'                => $request->handling_fee ?? [],
            'inspection_fee'              => $request->inspection_fee ?? [],
            'platform_fee'                => $request->platform_fee ?? [],
            'platform_fee_more_than'      => $request->platform_fee_more_than,
            'platform_fee_chargeable_fee' => $request->platform_fee_chargeable_fee,
            'dealers_fee'                 => $request->dealers_fee ?? [],
            'other_type_fee'              => $request->other_type_fee,
            'other_type_amount'           => $request->other_type_amount,
            'others_fee'                  => $request->others_fee ?? [],
            'tax_fee'                     => $request->tax_fee ?? [],
        ];

        $fee_tax->update($data);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'id'      => $fee_tax->id,
                'data'    => $fee_tax,
                'message' => 'Fee & Tax settings updated successfully',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function gethandlingfee(Request $request){
        //dd('inside get_business_unit');

        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_MADE_YEAR_SEARCH_DATA, Message: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to fetch Made Year data.'], 500);
        }

    }

    public function posthandlingfee(Request $request){

        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:business_unit,name',
            ]);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_MADE_YEAR_SEARCH_ADD_DATA, Message: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to add Made Year.'], 500);
        }

    }

     public function getinspectionfee(Request $request){
        //dd('inside get_business_unit');

        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_MADE_YEAR_SEARCH_DATA, Message: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to fetch Made Year data.'], 500);
        }

    }

    public function postinspectionfee(Request $request){

        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:business_unit,name',
            ]);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_MADE_YEAR_SEARCH_ADD_DATA, Message: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to add Made Year.'], 500);
        }

    }

     public function getdealerfee(Request $request){
        //dd('inside get_business_unit');

        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_MADE_YEAR_SEARCH_DATA, Message: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to fetch Made Year data.'], 500);
        }

    }

    public function postdealerfee(Request $request){

        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:business_unit,name',
            ]);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_MADE_YEAR_SEARCH_ADD_DATA, Message: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to add Made Year.'], 500);
        }

    }

     public function getothertypefee(Request $request){
        //dd('inside get_business_unit');

        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_MADE_YEAR_SEARCH_DATA, Message: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to fetch Made Year data.'], 500);
        }

    }

    public function postothertypefee(Request $request){

        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:business_unit,name',
            ]);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_MADE_YEAR_SEARCH_ADD_DATA, Message: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to add Made Year.'], 500);
        }

    }

     public function gettaxtypefee(Request $request){
        //dd('inside get_business_unit');

        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_MADE_YEAR_SEARCH_DATA, Message: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to fetch Made Year data.'], 500);
        }

    }

    public function posttaxtypefee(Request $request){

        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:business_unit,name',
            ]);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_MADE_YEAR_SEARCH_ADD_DATA, Message: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to add Made Year.'], 500);
        }

    }
}
