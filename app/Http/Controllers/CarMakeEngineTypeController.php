<?php

namespace App\Http\Controllers;

use App\Traits\commonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\CarMakeEngineType;
use Exception;

class CarMakeEngineTypeController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $data = CarMakeEngineType::paginate(20);
            return view('dynamic.dropdown.engineType.index', compact('data'))
                ->with('i', ($request->input('page', 1) - 1) * 20);

        } catch (Exception $e) {
            Log::error('ERROR::INDEX_CAR_MAKE_ENGINE_TYPE ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
           try {
            return view('dynamic.dropdown.engineType.create');
        } catch (Exception $e) {
            Log::error('ERROR::CREATE_CAR_MAKE_ENGINE_TYPE ' . $e->getMessage() . ' Line No: ' . $e->getLine());
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
            CarMakeEngineType::create($input);
            return redirect()->route('engine_type.index')
                ->with('success', 'Engine Type created successfully');
        } catch (Exception $e) {
            Log::error('ERROR::STORE_CAR_MAKE_ENGINE_TYPE' . $e->getMessage() . ' Line No: ' . $e->getLine());
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
             $engine_type = CarMakeEngineType::findOrFail($id);
             return view('dynamic.dropdown.engineType.edit', compact('engine_type'));
        } catch (Exception $e) {
            Log::error('ERROR::EDIT_CAR_MAKE_ENGINE_TYPE ' . $e->getMessage() . ' Line No: ' . $e->getLine());
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
            $engine_type = CarMakeEngineType::find($id);
            $engine_type->update($input);

            return redirect()->route('engine_type.index')->with('success', 'Engine Type Updated successfully');
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
            CarMakeEngineType::find($id)->delete();
            return redirect()->route('engine_type.index')
                ->with('success', 'Engine Type deleted successfully');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_ENGINE_TYPE_DELETE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function getEngineType(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_ENGINE_TYPE_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function postEngineType(Request $request)
    {
        try {
            $request->validate(['name' => 'required|string|max:255|unique:car_make_drive_trains,name']);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_ENGINE_TYPE_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
}
