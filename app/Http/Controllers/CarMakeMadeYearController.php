<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarMakeMadeYear;
use Illuminate\Support\Facades\Log;
use App\Traits\commonTrait;
use Exception;

class CarMakeMadeYearController extends Controller
{
    use commonTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $data = CarMakeMadeYear::paginate(10);
            return view('dynamic.dropdown.MadeYear.index', compact('data'));
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_MADE_YEAR_INDEX, Message: ' . $e->getMessage());
            return back()->with('error', 'Unable to fetch Made Years.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('dynamic.dropdown.MadeYear.create');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_MADE_YEAR_CREATE, Message: ' . $e->getMessage());
            return back()->with('error', 'Unable to open create form.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:4|unique:car_make_made_years,name',
        ]);

        try {
            CarMakeMadeYear::create($request->all());
            return redirect()->route('made_year.index')
                             ->with('success', 'Made Year created successfully.');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_MADE_YEAR_STORE, Message: ' . $e->getMessage());
            return redirect()->route('made_year.index')
                             ->with('error', 'Something went wrong while saving.');
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
            $madeyear = CarMakeMadeYear::findOrFail($id);
            return view('dynamic.dropdown.MadeYear.edit', compact('madeyear'));
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_MADE_YEAR_EDIT, Message: ' . $e->getMessage());
            return redirect()->route('made_year.index')
                             ->with('error', 'Unable to open edit form.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:4|unique:car_make_made_years,name,' . $id,
            'status' => 'required|boolean',
        ]);

        try {
            $madeyear = CarMakeMadeYear::findOrFail($id);
            $madeyear->update($request->all());

            return redirect()->route('made_year.index')
                             ->with('success', 'Made Year updated successfully.');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_MADE_YEAR_UPDATE, Message: ' . $e->getMessage());
            return redirect()->route('made_year.index')
                             ->with('error', 'Something went wrong while updating.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $madeyear = CarMakeMadeYear::findOrFail($id);
            $madeyear->delete();

            return redirect()->route('made_year.index')
                             ->with('success', 'Made Year deleted successfully.');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_MADE_YEAR_DESTROY, Message: ' . $e->getMessage());
            return redirect()->route('made_year.index')
                             ->with('error', 'Something went wrong while deleting.');
        }
    }

    public function getMadeYear(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_MADE_YEAR_SEARCH_DATA, Message: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to fetch Made Year data.'], 500);
        }
    }

    public function postMadeYear(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:car_make_made_years,name',
            ]);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_MADE_YEAR_SEARCH_ADD_DATA, Message: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to add Made Year.'], 500);
        }
    }
}
