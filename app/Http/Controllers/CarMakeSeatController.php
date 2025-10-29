<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarMakeSeat;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Traits\commonTrait;

class CarMakeSeatController extends Controller
{
    use commonTrait;

    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $data = CarMakeSeat::orderBy('id', 'DESC')->paginate(20);
    return view('dynamic.dropdown.MakeSeat.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('dynamic.dropdown.MakeSeat.create');
        } catch (Exception $e) {
            Log::error('ERROR::CREATE_CAR_MAKE_SEAT ' . $e->getMessage() . ' Line No: ' . $e->getLine());
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
            CarMakeSeat::create($input);
            return redirect()->route('make_seat.index')
                ->with('success', 'Make Seat created successfully');
        } catch (Exception $e) {
            Log::error('ERROR::STORE_CAR_MAKE_SEAT ' . $e->getMessage() . ' Line No: ' . $e->getLine());
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
        $make_seat = CarMakeSeat::findOrFail($id);
        return view('dynamic.dropdown.MakeSeat.edit', compact('make_seat'));
    } catch (Exception $e) {
        Log::error('Error::CAR_MAKE_SEAT_EDIT, Message: ' . $e->getMessage());
        return back()->with('error', 'Make Seat not found.');
    }
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:car_make_seat,name,' . $id,
            ]);

            $seat = CarMakeSeat::findOrFail($id);
            $seat->update([
                'name' => $request->name,
            ]);

            return redirect()->route('make_seat.index')->with('success', 'makeSeat updated successfully.');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_SEAT_UPDATE, Message: ' . $e->getMessage());
            return back()->with('error', 'Failed to update MakeSeat.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $seat = CarMakeSeat::findOrFail($id);
            $seat->delete();

            return redirect()->route('make_seat.index')->with('success', 'MakeSeat deleted successfully.');
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_SEAT_DESTROY, Message: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete MakeSeat.');
        }
    }

    /**
     * AJAX: Get seat options dynamically
     */
    public function getSeat(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_SEAT_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * AJAX: Add seat dynamically
     */
    public function postSeat(Request $request)
    {
        try {
            $request->validate(['name' => 'required|string|max:255|unique:car_make_seat,name']);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_SEAT_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
}
