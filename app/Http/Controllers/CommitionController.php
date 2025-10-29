<?php

namespace App\Http\Controllers;

use App\Models\commission;
use App\Models\Business_unit;
use Illuminate\Http\Request;
use App\Traits\commonTrait;

class CommitionController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         try {
            $commissionid = $this->generateCommissionId();
            $commissions = Commission::with('getCommissionType')->get();
            return view('marketing.price-fee-finance.commition.index', compact('commissionid','commissions'));

        } catch (Exception $e) {
            Log::error('ERROR::INDEX_CAR_MAKE_ COMMITION' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         try {
            return view('marketing.price-fee-finance.commition.create');
        } catch (Exception $e) {
            Log::error('ERROR::CREATE_CAR_MAKE_TRANSMISSION ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function generateCommissionId(): string
    {
        $date = now()->format('ymd'); // e.g. 250923
        $prefix = "CM" . $date;

        $last = Commission::whereDate('created_at', now())
            ->orderBy('id', 'desc')
            ->first();

        if (!$last) {
            $sequence = "000001";
        } else {
            $lastNumber = (int) substr($last->commission_id, -6);
            $sequence = str_pad($lastNumber + 1, 6, "0", STR_PAD_LEFT);
        }

        return $prefix . "-" . $sequence;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'commission_id'        => $request->commission_id,
            'designated_role'      => $request->designated_role,
            'business_unit'        => $request->business_unit,
            'department'           => $request->department,
            'specific_role'        => $request->specific_role,
            'commission_type'      => $request->commissionType,
            'duration'             => $request->duration,
            'start_date'           => $request->startDate,
            'end_date'             => $request->endDate,
            'commission_category'  => $request->commissionCategory,
            'commission_description' => $request->commission_description,
            'commission_duration' => $request->commission_duration,
            'commission_start_date' => $request->commission_start_date,
            'commission_end_date' => $request->commission_end_date,
            'tiered_category'      => $request->tiered_category?? [],
        ];

        $commission = commission::create($data);

        return response()->json([
            'success' => true,
            'id'      => $commission->id,
            'message' => 'Commission settings saved successfully',
            'data'    => $commission
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
        $commission = Commission::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $commission->id,
                'commission_id' => $commission->commission_id,
                'commission_type' => $commission->commission_type,
                'commission_type_id' => $commission->getCommissionType->id ?? null,
                'commission_type_name' => $commission->getCommissionType->name ?? null,
                'commission_unit_id' => $commission->getBusinessUnit->id ?? null,
                'commission_unit_name' => $commission->getBusinessUnit->name ?? null,
                'commission_department_id' => $commission->getDepartment->id ?? null,
                'commission_department_name' => $commission->getDepartment->name ?? null,
                'specific_role' => $commission->specific_role,
                'commission_category' => $commission->commission_category,
                'designated_role' => $commission->designated_role,
                'business_unit'      => $commission->business_unit,
                'department'           => $commission->department,
                'duration' => $commission->duration,
                'start_date' => $commission->start_date ? $commission->start_date->format('Y-m-d') : null,
                'end_date' => $commission->end_date ? $commission->end_date->format('Y-m-d') : null,
                'commission_description' => $commission->commission_description,
                'commission_duration' => $commission->commission_duration,
                'commission_start_date' => $commission->commission_start_date ? $commission->commission_start_date->format('Y-m-d') : null,
                'commission_end_date' => $commission->commission_end_date ? $commission->commission_end_date->format('Y-m-d') : null,
                'tiered_category' => $commission->tiered_category ?? [],
                
            ]
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Commission not found',
        ], 404);
    }
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
        $Commissions = Commission::findOrFail($id);

        $data = [
            'commission_id'        => $request->commission_id,
            'designated_role'      => $request->designated_role,
            'business_unit'        => $request->business_unit,
            'department'           => $request->department,
            'specific_role'           => $request->specific_role,
            'commission_type'      => $request->commissionType,
            'duration'             => $request->duration,
            'start_date'           => $request->startDate,
            'end_date'             => $request->endDate,
            'commission_category'  => $request->commissionCategory,
            'commission_description' => $request->commission_description,
            'commission_duration' => $request->commission_duration,
            'commission_start_date' => $request->commission_start_date,
            'commission_end_date' => $request->commission_end_date,
            'tiered_category'      => $request->tiered_category?? [],
        ];

        $Commissions->update($data);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'id'      => $Commissions->id,
                'data'    => $Commissions,
                'message' => 'Commission settings updated successfully',
            ]);
        }
    }

    public function togglestatus(Request $request){
        $Commission = Commission::find($request->id);
        $Commission->status = $request->status;
        $Commission->save();

        return response()->json(['success' => true]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function get_business_unit(Request $request){
        //dd('inside get_business_unit');

        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_MADE_YEAR_SEARCH_DATA, Message: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to fetch Made Year data.'], 500);
        }

    }

    public function post_business_unit(Request $request){

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

    public function get_commision_type(Request $request){
        //dd('inside get_business_unit');

        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_MADE_YEAR_SEARCH_DATA, Message: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to fetch Made Year data.'], 500);
        }

    }

    public function post_commision_type(Request $request){

        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:commision_type,name',
            ]);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_MADE_YEAR_SEARCH_ADD_DATA, Message: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to add Made Year.'], 500);
        }

    }

}

 