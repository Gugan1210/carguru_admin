<?php

namespace App\Http\Controllers;

use App\Models\CarMakeSteering;
use App\Traits\commonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class CarMakeSteeringController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       try {
            $data = CarMakeSteering::paginate(20);
            return view('dynamic.dropdown.steering.index', compact('data'))
                ->with('i', ($request->input('page', 1) - 1) * 20);

        } catch (Exception $e) {
            Log::error('ERROR::INDEX_CAR_MAKE_STEERING ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            return view('dynamic.dropdown.steering.create');
        } catch (Exception $e) {
            Log::error('ERROR::CREATE_CAR_MAKE_STEERING ' . $e->getMessage() . ' Line No: ' . $e->getLine());
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
            CarMakeSteering::create($input);
            return redirect()->route('steering.index')
                ->with('success', 'Steering created successfully');
        } catch (Exception $e) {
            Log::error('ERROR::STORE_CAR_MAKE_STEERING' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CarMakeSteering $carMakeSteering)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
             $steering = CarMakeSteering::findOrFail($id);
             return view('dynamic.dropdown.steering.edit', compact('steering'));
        } catch (Exception $e) {
            Log::error('ERROR::EDIT_CAR_MAKE_STEERING ' . $e->getMessage() . ' Line No: ' . $e->getLine());
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
            $steering = CarMakeSteering::find($id);
            $steering->update($input);

            return redirect()->route('steering.index')->with('success', 'Steering Updated successfully');
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
            CarMakeSteering::find($id)->delete();
            return redirect()->route('steering.index')
                ->with('success', 'Steering deleted successfully');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_STEERING_DELETE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function getSteering(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_STEERING_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function postSteering(Request $request)
    {
        try {
            $request->validate(['name' => 'required|string|max:255|unique:car_make_steerings,name']);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_STEERING_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
}
