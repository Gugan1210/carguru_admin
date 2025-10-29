<?php

namespace App\Http\Controllers;

use App\Traits\commonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\CarMakeExteriorColor;

class CarMakeExteriorColorController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = CarMakeExteriorColor::orderBy('id', 'DESC')->paginate(10);
            return view('dynamic.dropdown.exteriorcolor.index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_EXTERIOR_COLOR_INDEX, Message: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while fetching exteriorcolor.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('dynamic.dropdown.exteriorcolor.create');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_EXTERIOR_COLOR_CREATE, Message: ' . $e->getMessage());
            return back()->with('error', 'Failed to load ExteriorColor create page.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:car_make_exterior_colors,name',
                'status' => 'required|boolean',
            ]);

            $inputs = $request->all();

            CarMakeExteriorColor::create($inputs);

            return redirect()->route('exterior_color.store')->with('success', 'ExteriorColor created successfully.');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_EXTERIOR_COLOR_STORE, Message: ' . $e->getMessage());
            return back()->with('error', 'Failed to create exteriorcolor.');
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
            $exteriorcolor = CarMakeexteriorcolor::findOrFail($id);
            return view('dynamic.dropdown.exteriorcolor.edit', compact('exteriorcolor'));
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_EXTERIOR_COLOR_EDIT, Message: ' . $e->getMessage());
            return back()->with('error', 'ExteriorColor not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:car_make_exterior_colors,name,' . $id,
                'status' => 'required|boolean',
            ]);

            $exteriorcolor = CarMakeExteriorColor::findOrFail($id);
            $exteriorcolor->update([
                'name' => $request->name,
                'color' => $request->color,
                'status' => $request->status,
            ]);

            return redirect()->route('exterior_color.index')->with('success', 'Exteriorn Color updated successfully.');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_EXTERIOR_COLOR_UPDATE, Message: ' . $e->getMessage());
            return back()->with('error', 'Failed to update ExteriorColor.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $exteriorcolor = CarMakeExteriorColor::findOrFail($id);
            $exteriorcolor->delete();

            return redirect()->route('exterior_color.index')->with('success', 'Exterior Color deleted successfully.');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_EXTERIOR_COLOR_DESTROY, Message: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete ExteriorColor.');
        }
    }

    public function getExteriorColor(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q, 'color');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_EXTERIOR_COLOR_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function postExteriorColor(Request $request)
    {
        try {
            $request->validate(['name' => 'required|string|max:255|unique:car_make_exterior_colors,name']);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_EXTERIOR_COLOR_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
}
