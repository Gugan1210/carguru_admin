<?php

namespace App\Http\Controllers;

use App\Models\CarMakeCarGurusWarranty;
use App\Traits\commonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class CarMakeCarGurusWarrantyController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         try {
            $data = CarMakeCarGurusWarranty::paginate(20);
            return view('dynamic.dropdown.carguruswarranty.index', compact('data'))
                ->with('i', ($request->input('page', 1) - 1) * 20);

        } catch (Exception $e) {
            Log::error('ERROR::INDEX_CAR_MAKE_CARGURUS_WARRANTY ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
         try {
            return view('dynamic.dropdown.carguruswarranty.create');
        } catch (Exception $e) {
            Log::error('ERROR::CREATE_CAR_MAKE_CARGURUS_WARRANTY ' . $e->getMessage() . ' Line No: ' . $e->getLine());
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
            CarMakeCarGurusWarranty::create($input);
            return redirect()->route('cargurus_warranty.index')
                ->with('success', 'CargurusWarranty created successfully');
        } catch (Exception $e) {
            Log::error('ERROR::STORE_CAR_MAKE_CARGURUS_WARRANTY' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CarMakeCarGurusWarranty $CarMakeCarGurusWarranty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         try {
             $cargurus_warranty = CarMakeCargurusWarranty::findOrFail($id);
             return view('dynamic.dropdown.carguruswarranty.edit', compact('cargurus_warranty'));
        } catch (Exception $e) {
            Log::error('ERROR::EDIT_CAR_MAKE_CARGURUS_WARRANTY ' . $e->getMessage() . ' Line No: ' . $e->getLine());
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
            $cargurus_warranty = CarMakeCarGurusWarranty::find($id);
            $cargurus_warranty->update($input);

            return redirect()->route('cargurus_warranty.index')->with('success', 'cargurus_warranty Updated successfully');
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
            CarMakeCarGurusWarranty::find($id)->delete();
            return redirect()->route('cargurus_warranty.index')
                ->with('success', 'Cargurus Warranty deleted successfully');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_CARGURUS_WARRANTY_DELETE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function getCargurusWarranty(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_CargurusWarranty_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function postCargurusWarranty(Request $request)
    {
        try {
            $request->validate(['name' => 'required|string|max:255|unique:car_make_cargurus_warranties,name']);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_CargurusWarranty_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
}
