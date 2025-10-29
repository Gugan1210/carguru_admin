<?php

namespace App\Http\Controllers;

use App\Traits\commonTrait;
use Illuminate\Http\Request;
use App\Models\CarMakeFuelType;
use Illuminate\Support\Facades\Log;
use Exception;

class CarMakeFuelTypeController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $data = CarMakeFuelType::paginate(20);
            return view('dynamic.dropdown.fuelType.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * 20);
        } catch (Exception $e) {
            Log::error('ERROR::INDEX_CAR_MAKE_FUEL_TYPE ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('dynamic.dropdown.fuelType.create');
        } catch (Exception $e) {
            Log::error('ERROR::CREATE_CAR_MAKE_FUEL_TYPE ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'status' => 'required|boolean',
        ]);

        try {
            $input = $request->all();
            CarMakeFuelType::create($input);
            return redirect()->route('fuel_type.index')
                ->with('success', 'Fuel Type created successfully');
        } catch (Exception $e) {
            Log::error('ERROR::STORE_CAR_MAKE_FUEL_TYPE ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
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
        try {
            $fuel_type = CarMakeFuelType::findOrFail($id);

            return view('dynamic.dropdown.fuelType.edit', compact('fuel_type'));
        } catch (Exception $e) {
            Log::error('ERROR::EDIT_CAR_MAKE_FUEL_TYPE ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return redirect()->route('fuel_type.index')->with('error', 'Fuel Type not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'status' => 'required|boolean',
        ]);

        try {
            $input = $request->all();
            $transmission = CarMakeTransmission::find($id);
            $transmission->update($input);

            return redirect()->route('fuel_type.index')->with('success', 'fuel Type Updated successfully');
        } catch (Exception $e) {
            Log::error('ERROR::UPDATE_CAR_MAKE_TRANSMISSION ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            CarMakeFuelType::find($id)->delete();

            return redirect()->route('fuel_type.index')
                ->with('success', 'Fuel Type deleted successfully.');
        } catch (Exception $e) {
            Log::error('ERROR::DELETE_CAR_MAKE_FUEL_TYPE ' . $e->getMessage() . ' Line No: ' . $e->getLine());

            return redirect()->route('fuel_type.index')->with('error', 'Failed to delete Fuel Type.');
        }
    }




    public function getFuelTypes(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_FUEL_TYPE_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function postFuelTypes(Request $request)
    {
        try {
            $request->validate(['name' => 'required|string|max:255|unique:car_make_fuel_types,name']);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_FUEL_TYPE_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
}
