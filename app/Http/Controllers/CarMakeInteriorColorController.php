<?php

namespace App\Http\Controllers;

use App\Traits\commonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\CarMakeInteriorColor;

class CarMakeInteriorColorController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = CarMakeInteriorColor::orderBy('id', 'DESC')->paginate(10);
            return view('dynamic.dropdown.interiorcolor.index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_INTERIOR_COLOR_INDEX, Message: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while fetching interior colors.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('dynamic.dropdown.interiorcolor.create');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_INTERIOR_COLOR_CREATE, Message: ' . $e->getMessage());
            return back()->with('error', 'Failed to load interior color create page.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:car_make_interior_colors,name',
                'status' => 'required|boolean',
            ]);
            $inputs = $request->all();
            CarMakeInteriorColor::create($inputs);

            return redirect()->route('interior_color.index')
                ->with('success', 'Interior color created successfully.');

        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_INTERIOR_COLOR_STORE, Message: ' . $e->getMessage());
            return back()->with('error', 'Failed to create interior color.');
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
            $interiorcolor = CarMakeInteriorColor::findOrFail($id);
            return view('dynamic.dropdown.interiorcolor.edit', compact('interiorcolor'));
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_INTERIOR_COLOR_EDIT, Message: ' . $e->getMessage());
            return back()->with('error', 'Interior color not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:car_make_interior_colors,name,' . $id,
                'status' => 'required|boolean',
            ]);

            $interiorcolor = CarMakeInteriorColor::findOrFail($id);
            $interiorcolor->update([
                'name' => $request->name,
                'status' => $request->status,
            ]);

            // redirect to listing page
            return redirect()->route('interior_color.index')
                ->with('success', 'Interior color updated successfully.');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_INTERIOR_COLOR_UPDATE, Message: ' . $e->getMessage());
            return back()->with('error', 'Failed to update interior color.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getInteriorColor(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q, 'color');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_INTERIOR_COLOR_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function postInteriorColor(Request $request)
    {
        try {
            $request->validate(['name' => 'required|string|max:255|unique:car_make_interior_colors,name']);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_INTERIOR_COLOR_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
}
