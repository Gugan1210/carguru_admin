<?php

namespace App\Http\Controllers;

use App\Models\CarDetailUsage;
use App\Traits\commonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class CarDetailUsageController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         try {
            $data = CarDetailUsage::paginate(20);
           
            return view('dynamic.dropdown.usage.index', compact('data'))
                ->with('i', ($request->input('page', 1) - 1) * 20);

        } catch (Exception $e) {
            Log::error('ERROR::INDEX_CAR_MAKE_USAGE ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            return view('dynamic.dropdown.usage.create');
        } catch (Exception $e) {
            Log::error('ERROR::CREATE_CAR_MAKE_USAGE ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        } //
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
            CarDetailUsage::create($input);
            return redirect()->route('usage.index')
                ->with('success', 'Usage created successfully');
        } catch (Exception $e) {
            Log::error('ERROR::STORE_CAR_MAKE_USAGE' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CarDetailUsage $carDetailUsage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       try {
             $usage = CarDetailUsage::findOrFail($id);
             return view('dynamic.dropdown.usage.edit', compact('usage'));
        } catch (Exception $e) {
            Log::error('ERROR::EDIT_CAR_MAKE_USAGE ' . $e->getMessage() . ' Line No: ' . $e->getLine());
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
            $usage = CarDetailusage::find($id);
            $usage->update($input);

            return redirect()->route('usage.index')->with('success', 'usage Updated successfully');
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
            CarDetailUsage::find($id)->delete();
            return redirect()->route('usage.index')
                ->with('success', 'Usage deleted successfully');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_USAGE_DELETE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
    public function getUsage(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_DETAIL_Usage_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function postUsage(Request $request)
    {
        try {
            $request->validate(['name' => 'required|string|max:255|unique:car_detail_usages,name']);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_DETAIL_Usage_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
}
