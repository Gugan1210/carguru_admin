<?php

namespace App\Http\Controllers;

use App\Models\CarMakeBrake;
use App\Traits\commonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Exception;

class CarMakeBrakeController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
          try {
            $data = CarMakeBrake::paginate(20);
            return view('dynamic.dropdown.brake.index', compact('data'))
                ->with('i', ($request->input('page', 1) - 1) * 20);

        } catch (Exception $e) {
            Log::error('ERROR::INDEX_CAR_MAKE_BRAKE ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
       try {
            return view('dynamic.dropdown.brake.create');
        } catch (Exception $e) {
            Log::error('ERROR::CREATE_CAR_MAKE_BRAKE ' . $e->getMessage() . ' Line No: ' . $e->getLine());
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
            CarMakeBrake::create($input);
            return redirect()->route('brake.index')
                ->with('success', 'Brake created successfully');
        } catch (Exception $e) {
            Log::error('ERROR::STORE_CAR_MAKE_BRAKE' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CarMakeBrake $carMakeBrake)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
          try {
             $brake = CarMakeBrake::findOrFail($id);
             return view('dynamic.dropdown.brake.edit', compact('brake'));
        } catch (Exception $e) {
            Log::error('ERROR::EDIT_CAR_MAKE_BRAKE ' . $e->getMessage() . ' Line No: ' . $e->getLine());
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
            $brake = CarMakeBrake::find($id);
            $brake->update($input);

            return redirect()->route('brake.index')->with('success', 'Brake Updated successfully');
        } catch (Exception $e) {
            Log::error('ERROR::ENGINE_STYLE ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       try {
            CarMakeBrake::find($id)->delete();
            return redirect()->route('brake.index')
                ->with('success', 'Brake deleted successfully');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_BRAKE_DELETE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function getBrakes(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_BRAKES_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function postBrakes(Request $request)
    {
        try {
            $request->validate(['name' => 'required|string|max:255|unique:car_make_brakes,name']);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_BRAKES_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
}
