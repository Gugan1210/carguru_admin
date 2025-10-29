<?php

namespace App\Http\Controllers;

use App\Traits\commonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\CarMakeDriveTrain;

class CarMakeDriveTrainController extends Controller
{
    use commonTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = CarMakeDriveTrain::paginate(20);
            return view('dynamic.dropdown.driveTrain.index', compact('data'));
        } catch (Exception $e) {
            Log::error('ERROR::INDEX_CAR_MAKE_DRIVE_TRAIN ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return back()->with('error', 'Unable to fetch Drive Trains.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('dynamic.dropdown.driveTrain.create');
        } catch (Exception $e) {
            Log::error('ERROR::CREATE_CAR_MAKE_DRIVE_TRAIN ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return back()->with('error', 'Unable to open create form.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:car_make_drive_trains,name',
            'status' => 'required|boolean',
        ]);

        try {
            CarMakeDriveTrain::create($request->all());
            return redirect()->route('drive_train.index')
                ->with('success', 'Drive Train created successfully.');
        } catch (Exception $e) {
            Log::error('ERROR::STORE_CAR_MAKE_DRIVE_TRAIN ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return redirect()->route('drive_train.index')
                ->with('error', 'Something went wrong while saving.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $driveTrain = CarMakeDriveTrain::findOrFail($id);
            return view('dynamic.dropdown.driveTrain.show', compact('driveTrain'));
        } catch (Exception $e) {
            Log::error('ERROR::SHOW_CAR_MAKE_DRIVE_TRAIN ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return redirect()->route('drive_train.index')
                ->with('error', 'Drive Train not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $driveTrain = CarMakeDriveTrain::findOrFail($id);
            return view('dynamic.dropdown.driveTrain.edit', compact('driveTrain'));
        } catch (Exception $e) {
            Log::error('ERROR::EDIT_CAR_MAKE_DRIVE_TRAIN ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return redirect()->route('drive_train.index')
                ->with('error', 'Unable to open edit form.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:car_make_drive_trains,name,' . $id,
            'status' => 'required|boolean',
        ]);

        try {
            $driveTrain = CarMakeDriveTrain::findOrFail($id);
            $driveTrain->update($request->all());

            return redirect()->route('drive_train.index')
                ->with('success', 'Drive Train updated successfully.');
        } catch (Exception $e) {
            Log::error('ERROR::UPDATE_CAR_MAKE_DRIVE_TRAIN ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return redirect()->route('drive_train.index')
                ->with('error', 'Something went wrong while updating.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $driveTrain = CarMakeDriveTrain::findOrFail($id);
            $driveTrain->delete();

            return redirect()->route('drive_train.index')
                ->with('success', 'Drive Train deleted successfully.');
        } catch (Exception $e) {
            Log::error('ERROR::DESTROY_CAR_MAKE_DRIVE_TRAIN ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return redirect()->route('drive_train.index')
                ->with('error', 'Something went wrong while deleting.');
        }
    }

    /**
     * Get dropdown options for Drive Train (AJAX).
     */
    public function getDriveTrains(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('ERROR::GET_CAR_MAKE_DRIVE_TRAIN ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return response()->json(['error' => 'Unable to fetch Drive Train data.'], 500);
        }
    }

    /**
     * Store Drive Train from dropdown (AJAX).
     */
    public function postDriveTrains(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:car_make_drive_trains,name'
            ]);

            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('ERROR::POST_CAR_MAKE_DRIVE_TRAIN ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return response()->json(['error' => 'Unable to add Drive Train.'], 500);
        }
    }
}
