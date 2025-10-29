<?php

namespace App\Http\Controllers;

use App\Models\CarMakeConsumption;
use App\Traits\commonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class CarMakeConsumptionController extends Controller
{
    use commonTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = CarMakeConsumption::orderBy('id', 'DESC')->paginate(10);
            return view('dynamic.dropdown.MakeConsumption.index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_CONSUMPTION_INDEX, Message: ' . $e->getMessage());
            return back()->with('error', 'Unable to fetch Make Consumption list.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dynamic.dropdown.MakeConsumption.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:car_make_consumptions,name',
                'status' => 'required|boolean',
            ]);

            CarMakeConsumption::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);

            return redirect()->route('make_consumption.index')
                ->with('success', 'Make Consumption created successfully.');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_CONSUMPTION_STORE, Message: ' . $e->getMessage());
            return back()->with('error', 'Unable to create Make Consumption.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $make_consumption = CarMakeConsumption::findOrFail($id);
            return view('dynamic.dropdown.MakeConsumption.edit', compact('make_consumption'));
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_CONSUMPTION_EDIT, Message: ' . $e->getMessage());
            return back()->with('error', 'Make Consumption not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:car_make_consumptions,name,' . $id,
                'status' => 'required|boolean',
            ]);

            $make_consumption = CarMakeConsumption::findOrFail($id);
            $make_consumption->update([
                'name' => $request->name,
                'status' => $request->status,
            ]);

            return redirect()->route('make_consumption.index')
                ->with('success', 'Make Consumption updated successfully.');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_CONSUMPTION_UPDATE, Message: ' . $e->getMessage());
            return back()->with('error', 'Unable to update Make Consumption.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $make_consumption = CarMakeConsumption::findOrFail($id);
            $make_consumption->delete();

            return redirect()->route('make_consumption.index')
                ->with('success', 'Make Consumption deleted successfully.');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_CONSUMPTION_DESTROY, Message: ' . $e->getMessage());
            return back()->with('error', 'Unable to delete Make Consumption.');
        }
    }

    /**
     * AJAX GET for dropdown search.
     */
    public function getConsumption(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_CONSUMPTION_SEARCH_DATA, Message: ' . $e->getMessage());
        }
    }

    /**
     * AJAX POST for adding new option from dropdown.
     */
    public function postConsumption(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:car_make_consumption,name'
            ]);

            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_CONSUMPTION_SEARCH_ADD_DATA, Message: ' . $e->getMessage());
        }
    }
}
