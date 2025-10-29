<?php

namespace App\Http\Controllers;

use App\Models\CarMakeSuspension;
use App\Traits\commonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class CarMakeSuspensionController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         try {
            $data = CarMakeSuspension::orderBy('id', 'DESC')->paginate(10);
            return view('dynamic.dropdown.Suspension.index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_SUSPENSION_INDEX, Message: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while fetching suspensions.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         try {
        return view('dynamic.dropdown.Suspension.create');
    } catch (Exception $e) {
        Log::error('Error::CAR_MAKE_SUSPENSION_CREATE, Message: ' . $e->getMessage());
        return back()->with('error', 'Failed to load suspension create page.');
    }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name'   => 'required|string|max:255|unique:car_make_suspensions,name',
                'status' => 'required|boolean',
            ]);

            CarMakeSuspension::create([
                'name'   => $request->name,
                'status' => $request->status,
            ]);

            return redirect()->route('make_suspension.index')->with('success', 'Suspension created successfully.');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_SUSPENSION_STORE, Message: ' . $e->getMessage());
            return back()->with('error', 'Failed to create suspension.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }
    /**
     * Show the form for editing the specified resource.
     */
     public function edit($id)
    {
        try {
            $suspension = CarMakeSuspension::findOrFail($id);
            return view('dynamic.dropdown.Suspension.edit', compact('suspension'));
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_SUSPENSION_EDIT, Message: ' . $e->getMessage());
            return back()->with('error', 'Suspension not found.');
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name'   => 'required|string|max:255|unique:car_make_suspensions,name,' . $id,
                'status' => 'required|boolean',
            ]);

            $suspension = CarMakeSuspension::findOrFail($id);
            $suspension->update([
                'name'   => $request->name,
                'status' => $request->status,
            ]);

            return redirect()->route('make_suspension.index')->with('success', 'Suspension updated successfully.');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_SUSPENSION_UPDATE, Message: ' . $e->getMessage());
            return back()->with('error', 'Failed to update suspension.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy($id)
    {
        try {
            $suspension = CarMakeSuspension::findOrFail($id);
            $suspension->delete();

            return redirect()->route('make_suspension.index')->with('success', 'Suspension deleted successfully.');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_SUSPENSION_DESTROY, Message: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete suspension.');
        }
    }
    public function getSuspension(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_SUSPENSION_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function postSuspension(Request $request)
    {
        try {
            $request->validate(['name' => 'required|string|max:255|unique:car_make_suspensions,name']);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_SUSPENSION_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
}
