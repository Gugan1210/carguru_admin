<?php

namespace App\Http\Controllers;

use App\Models\EngineCC;
use Illuminate\Http\Request;
use App\Traits\commonTrait;
use Exception;
use Illuminate\Support\Facades\Log;

class EngineCcController extends Controller
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
    public function show(EngineCC $engineCC)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EngineCC $engineCC)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EngineCC $engineCC)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EngineCC $engineCC)
    {
        //
    }

    public function getEngineCC(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_TRANSMISSION_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function postEngineCC(Request $request)
    {
        try {
            $request->validate(['name' => 'required|string|max:255|unique:engineccs,name']);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_TRANSMISSION_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
}
