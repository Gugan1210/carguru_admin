<?php

namespace App\Http\Controllers;

use App\Models\AdPlacement;
use App\Traits\commonTrait;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class AdPlacementController extends Controller
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
    public function show(AdPlacement $adPlacement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdPlacement $adPlacement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdPlacement $adPlacement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdPlacement $adPlacement)
    {
        //
    }

    public function getAdPlacement(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('ERROR::GET_CAR_MARKETING_ADS ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return response()->json(['error' => 'Unable to fetch Drive Train data.'], 500);
        }
    }

    public function postAdplacement(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:adplacement,name'
            ]);

            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::GET_CAR_MARKETING_ADS_SEARCH_DATA, Message: ' . $e->getMessage());
        }
    }
}
