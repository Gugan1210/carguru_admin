<?php

namespace App\Http\Controllers;

use App\Models\CarMakeManufacturersWarranty;
use App\Traits\commonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class CarMakeManufacturersWarrantyController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       try {
            $data = CarMakeManufacturerswarranty::paginate(20);
            return view('dynamic.dropdown.Manufacturerswarranty.index', compact('data'));
        } catch (Exception $e) {
            Log::error('ERROR::INDEX_CAR_MAKE_MANUFACTUREWRS_WARRANTY ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return back()->with('error', 'Unable to fetch Manufacturers_warrenty.');
        }

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(Request $request)
{
    try {
            return view('dynamic.dropdown.Manufacturerswarranty.create');
        } catch (Exception $e) {
            Log::error('ERROR::CREATE_CAR_MAKE_MANUFACTURERS_WARRANTY ' . $e->getMessage() . ' Line No: ' . $e->getLine());
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
            CarMakeManufacturerswarranty::create($input);
            return redirect()->route('manufacturers_warranty.index')
                ->with('success', 'manufacturers_warrantry created successfully');
        } catch (Exception $e) {
            Log::error('ERROR::STORE_CAR_MAKE_MANUFACTURERS_WARRANTY ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CarMakeManufacturersWarranty $carMakeManufacturersWarranty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         try {
        $manufacturers_warranty = CarMakeManufacturerswarranty::findOrFail($id);

        return view('dynamic.dropdown.Manufacturerswarranty.edit', compact('manufacturers_warranty'));
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
            $transmission = CarMakeManufacturersWarranty::find($id);
            $transmission->update($input);

            return redirect()->route('manufacturers_warranty.index')->with('success', 'MakeManufacturersWarranty Updated successfully');
        } catch (Exception $e) {
            Log::error('ERROR::UPDATE_CAR_MANUFACTURERS_WARRANTY' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         try {
        CarMakeManufacturersWarranty::find($id)->delete();

        return redirect()->route('manufacturers_warranty.index')
            ->with('success', 'ManufacturersWarranty deleted successfully.');
    } catch (Exception $e) {
        Log::error('ERROR::DELETE_CAR_MAKE_MANUFACTURERS_WARRANTY' . $e->getMessage() . ' Line No: ' . $e->getLine());

        return redirect()->route('manufacturers_warranty.index')->with('error', 'Failed to delete ManufacturersWarranty.');
    }
    }

    public function getManufacturersWarranty(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_manufacturers_warranties_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function postManufacturersWarranty(Request $request)
    {
        try {
            $request->validate(['name' => 'required|string|max:255|unique:car_make_manufacturers_warranties,name']);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_manufacturers_warranties_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
}
