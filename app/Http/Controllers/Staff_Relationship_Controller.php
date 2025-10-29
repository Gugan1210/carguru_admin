<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Staff_Relationship_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('marketing.price-fee-finance.commition.index');
        } catch (Exception $e) {
            Log::error('ERROR::CREATE_CAR_MAKE_TRANSMISSION ' . $e->getMessage() . ' Line No: ' . $e->getLine());
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
