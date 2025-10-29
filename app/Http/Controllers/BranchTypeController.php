<?php

namespace App\Http\Controllers;

use App\Models\BranchType;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\commonTrait;

class BranchTypeController extends Controller
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
    public function show(BranchType $branchType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BranchType $branchType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BranchType $branchType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BranchType $branchType)
    {
        //
    }

    public function getBranchType(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_BRANCH_TYPE_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function postBranchType(Request $request)
    {
        try {
            $request->validate(['name' => 'required|string|max:255|unique:branch_types,name']);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_BRANCH_TYPE_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
}
