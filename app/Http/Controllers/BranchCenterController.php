<?php

namespace App\Http\Controllers;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\BranchCenter;
use App\Models\CountryState;
use App\Models\CountryStateCity;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\commonTrait;


class BranchCenterController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $data = BranchCenter::with('country')->paginate(10);

            $currentPage = $request->input('page', 1);

            return view('dynamic.dropdown.branch_center.index', compact('data'))
                ->with('i', ($currentPage - 1) * 10);
        } catch (Exception $e) {
            Log::error('ERROR::Branch Center Index  ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            abort(500, 'Something went wrong.');
        }
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $countries = Country::all();
            return view('dynamic.dropdown.branch_center.create', compact('countries'));
        } catch (Exception $e) {
            Log::error('Branch Center Create Form Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load create form.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'country_id' => 'required|integer',
            'state_id' => 'required|integer',
            'city_id' => 'required|integer',
            'branch_type' => 'required|string|max:255',
            'branch_name' => 'required|string|max:255',
            'status' => 'required',
        ]);

        try {
            $inputs = $request->all();
            BranchCenter::create($inputs);

            return redirect()->route('branch_center.index')->with('success', 'Branch Center saved successfully.');
        } catch (Exception $e) {
            Log::error('Error::STORE_BRANCH_CENTER, Message: ' . $e->getMessage());
            return back()->with('error', 'Failed to create branch center.')->withInput();
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
            $branch_center = BranchCenter::findOrFail($id);
            $countries = Country::all();
            return view('dynamic.dropdown.branch_center.edit', compact('branch_center', 'countries'));
        } catch (Exception $e) {
            Log::error('Error::UNITS_DESTROY, Message: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete Units.');

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'country_id' => 'required|integer',
            'state_id' => 'required|integer',
            'city_id' => 'required|integer',
            'branch_type' => 'required|string|max:255',
            'branch_name' => 'required|string|max:255',
            'status' => 'required',
        ]);

        try {
            $inputs = $request->all();
            $branch = BranchCenter::findOrFail($id);
            $branch->update($inputs);

            return redirect()->route('branch_center.index')->with('success', 'Branch Center Updated successfully.');
        } catch (Exception $e) {
            Log::error('Error::UPDATE_BRANCH_CENTER, Message: ' . $e->getMessage());
            return back()->with('error', 'Failed to Update branch center.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            BranchCenter::find($id)->delete();
            return redirect()->route('branch_center.index')
                ->with('success', 'branch_center deleted successfully');
        } catch (Exception $e) {
            Log::error('Error::branch_center_DELETE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function getBranchCenter(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_BRANCH_TYPE_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function postBranchCenter(Request $request)
    {
        try {
            $request->validate(['name' => 'required|string|max:255|unique:branch_centers,name']);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_BRANCH_TYPE_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
}
