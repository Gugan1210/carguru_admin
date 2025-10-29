<?php

namespace App\Http\Controllers;

use App\Traits\commonTrait;
use Illuminate\Http\Request;
use App\Models\CarMakeTransmission;
use Illuminate\Support\Facades\Log;
use Exception;

class CarMakeTransmissionController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $data = CarMakeTransmission::paginate(20);
            return view('dynamic.dropdown.transmission.index', compact('data'))
                ->with('i', ($request->input('page', 1) - 1) * 20);

        } catch (Exception $e) {
            Log::error('ERROR::INDEX_CAR_MAKE_TRANSMISSION ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('dynamic.dropdown.transmission.create');
        } catch (Exception $e) {
            Log::error('ERROR::CREATE_CAR_MAKE_TRANSMISSION ' . $e->getMessage() . ' Line No: ' . $e->getLine());
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
            CarMakeTransmission::create($input);
            return redirect()->route('transmission.index')
                ->with('success', 'Transmission created successfully');
        } catch (Exception $e) {
            Log::error('ERROR::STORE_CAR_MAKE_TRANSMISSION ' . $e->getMessage() . ' Line No: ' . $e->getLine());
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
            $transmission = CarMakeTransmission::findOrFail($id);
            return view('dynamic.dropdown.transmission.edit', compact('transmission'));
        } catch (Exception $e) {
            Log::error('ERROR::EDIT_CAR_MAKE_TRANSMISSION ' . $e->getMessage() . ' Line No: ' . $e->getLine());
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

            return redirect()->route('transmission.index')->with('success', 'Transmission Updated successfully');
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
            CarMakeTransmission::find($id)->delete();
            return redirect()->route('transmission.index')
                ->with('success', 'Transmission deleted successfully');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_TRANSMISSION_DELETE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function getTransmissions(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_TRANSMISSION_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function postTransmissions(Request $request)
    {
        try {
            $request->validate(['name' => 'required|string|max:255|unique:car_make_transmissions,name']);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_TRANSMISSION_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
}
