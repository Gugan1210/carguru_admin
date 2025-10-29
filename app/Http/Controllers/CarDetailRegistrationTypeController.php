<?php

namespace App\Http\Controllers;

use App\Models\CarDetailRegistrationType;
use App\Traits\commonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class CarDetailRegistrationTypeController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
  
    public function index(Request $request)
   
{
      try {
            $data = CarDetailRegistrationType::paginate(20);
           
            return view('dynamic.dropdown.registrationType.index', compact('data'))
                ->with('i', ($request->input('page', 1) - 1) * 20);

        } catch (Exception $e) {
            Log::error('ERROR::INDEX_CAR_MAKE_REGISTRATION_TYPE ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            return view('dynamic.dropdown.registrationType.create');
        } catch (Exception $e) {
            Log::error('ERROR::CREATE_CAR_MAKE_REGISTRATION_TYPE ' . $e->getMessage() . ' Line No: ' . $e->getLine());
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
            CarDetailRegistrationType::create($input);
            return redirect()->route('registration_type.index')
                ->with('success', 'Registration Type created successfully');
        } catch (Exception $e) {
            Log::error('ERROR::STORE_CAR_MAKE_REGISTRATION_TYPE' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CarDetailRegistrationType $carDetailRegistrationType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       try {
    $registration_type = CarDetailRegistrationType::findOrFail($id);
    return view('dynamic.dropdown.registrationType.edit', compact('registration_type'));
} catch (Exception $e) {
    Log::error('ERROR::EDIT_CAR_MAKE_REGISTRATION_TYPE ' . $e->getMessage() . ' Line No: ' . $e->getLine());
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
            $usage = CarDetailRegistrationType::find($id);
            $usage->update($input);

            return redirect()->route('registration_type.index')->with('success', 'Registration Type Updated successfully');
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
            CarDetailRegistrationType::find($id)->delete();
            return redirect()->route('registration_type.index')
                ->with('success', 'Registration Type deleted successfully');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_REGISTRATION_TYPE_DELETE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
    

    public function getRegistrationType(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_DETAIL_Registration_Type_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function postRegistrationType(Request $request)
    {
        try {
            $request->validate(['name' => 'required|string|max:255|unique:car_detail_category,name']);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_DETAIL_Registration_Type_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
}
