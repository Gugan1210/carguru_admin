<?php

namespace App\Http\Controllers;

use App\Models\BranchCenter;
use App\Models\CountryState;
use App\Models\CountryStateCity;
use App\Models\StaffDepartment;
use Illuminate\Http\Request;
use App\Models\Staff;
use Exception;
use Illuminate\Support\Facades\Log;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $branches = BranchCenter::where('status', '1')->get();
            $states = CountryState::where('status', 1)->get();
            $per_Page = isset($request->per_page) ? $request->per_page : 10;
            $departments = StaffDepartment::all();
            $query = Staff::query();
            if (isset($request->search) || isset($request->department_filter)) {
                if (isset($request->search)) {
                    $query = $query->where('name', 'like', $request->serach);
                }
                if (isset($request->department_filter)) {
                    $query = $query->where('department', $request->department_filter);
                }

            }
            $data = $query->paginate(10);

            return view('humancapital.staff.index', compact('data', 'states', 'branches', 'departments'))->with('i', ($request->input('page', 1) - 1) * 10);
        } catch (Exception $e) {
            Log::error('ERROR::INDEX_HUMAN_CAPITAL_STAFF' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                "staff_id" => 'required',
                "business_unit" => 'required',
                "department" => 'required',
                "status" => 'required',
                "designated_role" => 'required',
                "designated_location" => 'required',
                "i_c_number" => 'required',
                "gender" => 'required',
                "race" => 'required',
                "contact_number" => 'required',
                "address_line_1" => 'required',
                "address_line_2" => 'required',
                "postcode" => 'required',
                "state_id" => 'required',
                "city_id" => 'required',
                "emergency_name" => 'required',
                "emergency_contact" => 'required',
                "relationship" => 'required',
                "bank_name" => 'required',
                "bank_account_number" => 'required',
                "profile_image" => 'required',
                "name" => 'required',
                "email" => 'required|email|unique:staffs,email',
            ],
            [
                "staff_id.required" => "Staff ID is required.",
                "business_unit.required" => "Business Unit must be selected.",
                "department.required" => "Department is required.",
                "status.required" => "Status is required.",
                "designated_role.required" => "Designated role is required.",
                "designated_location.required" => "Designated location is required.",
                "i_c_number.required" => "IC Number is required.",
                "gender.required" => "Please select a gender.",
                "race.required" => "Race is required.",
                "contact_number.required" => "Contact number is required.",
                "address_line_1.required" => "Address Line 1 is required.",
                "address_line_2.required" => "Address Line 2 is required.",
                "postcode.required" => "Postcode is required.",
                "state_id.required" => "State must be selected.",
                "city_id.required" => "City must be selected.",
                "emergency_name.required" => "Emergency contact name is required.",
                "emergency_contact.required" => "Emergency contact number is required.",
                "relationship.required" => "Relationship is required.",
                "bank_name.required" => "Bank name is required.",
                "bank_account_number.required" => "Bank account number is required.",
                "profile_image.required" => "Profile image is required.",
                "name.required" => "Full name is required.",
                "email.required" => "Email address is required.",
                "email.email" => "Please enter a valid email address.",
                "email.unique" => $request->email . " email is already taken.",
            ]
        );

        try {
            $inputs = $request->all();
            $inputs['profile_image'] = $request->file('profile_image')->store('images', 'public');
            Staff::create($inputs);
            return redirect()->route('staff.index')
                ->with('success', 'Staff created successfully');
        } catch (Exception $e) {
            Log::error('ERROR::CREATE_HUMAN_CAPITAL_STAFF' . $e->getMessage() . ' Line No: ' . $e->getLine());
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
            $branches = BranchCenter::where('status', '1')->get();
            $states = CountryState::where('status', 1)->get();
            $staff = Staff::findOrFail($id);
            // dd($staff);
            return view('humancapital.staff.edit', compact('staff', 'states', 'branches'));
        } catch (Exception $e) {
            Log::error('ERROR::EDIT_HUMAN_CAPITAL_STAFF' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            "staff_id" => 'required',
            "business_unit" => 'required',
            "department" => 'required',
            "status" => 'required',
            "designated_role" => 'required',
            "designated_location" => 'required',
            // "specific_function" => 'required',
            "i_c_number" => 'required',
            "gender" => 'required',
            "race" => 'required',
            "contact_number" => 'required',
            "address_line_1" => 'required',
            "address_line_2" => 'required',
            "postcode" => 'required',
            "state_id" => 'required',
            "city_id" => 'required',
            "emergency_name" => 'required',
            "emergency_contact" => 'required',
            "relationship" => 'required',
            "bank_name" => 'required',
            "bank_account_number" => 'required',
            // "profile_image" => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:staffs,email',
        ]);

        try {
            $inputs = $request->all();

            $staff = Staff::find($id);

            if (isset($request->profile_image)) {
                $inputs['profile_image'] = $request->file('profile_image')->store('images', 'public');
            }
            $staff->update($inputs);

            return redirect()->route('staff.index')
                ->with('success', 'Staff updated successfully');
        } catch (Exception $e) {
            Log::error('ERROR::UPDATE_HUMAN_CAPITAL_STAFF' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getLastStaffId()
    {
        try {
            $lastStaff = Staff::orderBy('staff_id', 'desc')->first();
            $lastId = $lastStaff ? (int) $lastStaff->staff_id : 0;

            return response()->json([
                'last_id' => $lastId
            ]);
        } catch (Exception $e) {
            Log::error('ERROR::INDEX_HUMAN_CAPITAL_STAFF_GENERATE_ID' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function getStates($country_id)
    {
        try {
            $states = CountryState::where('country_id', $country_id)->orderBy('state_name')->get();

            return response()->json($states);
        } catch (Exception $e) {
            Log::error('ERROR::INDEX_HUMAN_CAPITAL_STAFF_STATE_LIST' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function getCities($stateId)
    {
        try {
            $cities = CountryStateCity::where('state_id', $stateId)->orderBy('city_name')->get();

            return response()->json($cities);
        } catch (Exception $e) {
            Log::error('ERROR::INDEX_HUMAN_CAPITAL_STAFF_CITY_LIST' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

}
