<?php

namespace App\Http\Controllers;

use App\Models\AdTopic;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\commonTrait;

class AdTopicController extends Controller
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
    public function show(AdTopic $adTopic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdTopic $adTopic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdTopic $adTopic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdTopic $adTopic)
    {
        //
    }

    public function getAdTopic(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q, '', $request->ad_placement_id);
        } catch (Exception $e) {
            Log::error('ERROR::GET_CAR_MARKETING_ADS ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return response()->json(['error' => 'Unable to fetch Drive Train data.'], 500);
        }
    }

    public function postAdTopic(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:adtopic,name',
                'ad_placement_id' => 'required|numeric'
            ]);

            return $this->postDropdownOptions($request->field_id, $request->name, $request->ad_placement_id);
        } catch (Exception $e) {
            Log::error('Error::GET_CAR_MARKETING_ADS_SEARCH_DATA, Message: ' . $e->getMessage());
        }
    }
}
