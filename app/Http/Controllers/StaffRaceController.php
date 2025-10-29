<?php

namespace App\Http\Controllers;

use App\Models\StaffRace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Traits\commonTrait;

class StaffRaceController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StaffRace $staffRace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StaffRace $staffRace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StaffRace $staffRace)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaffRace $staffRace)
    {
        //
    }

    public function getStaffRace(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::STAFF_RACE_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function postStaffRace(Request $request)
    {
        try {
            $request->validate(['name' => 'required|string|max:255|unique:staff_races,name']);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::STAFF_RACE_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
}
