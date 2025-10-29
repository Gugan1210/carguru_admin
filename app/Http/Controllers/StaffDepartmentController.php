<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaffDepartment;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\commonTrait;

class StaffDepartmentController extends Controller
{
    use commonTrait;


    // public function getStaffDepartment(Request $request)
    // {
    //     try {
    //         return $this->getDropdownOptions($request->field_id, $request->q);
    //     } catch (Exception $e) {
    //         Log::error('Error::HUMAN_CAPITAL_STAFF_DEPARTMENT_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
    //     }
    // }

    // public function postStaffDepartment(Request $request)
    // {
    //     try {
    //         $request->validate(['name' => 'required|string|max:255|unique:staff_departments,name']);
    //         return $this->postDropdownOptions($request->field_id, $request->name);
    //     } catch (Exception $e) {
    //         Log::error('Error::HUMAN_CAPITAL_STAFF_DEPARTMENT_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
    //     }
    // }

    public function getStaffDepartment(Request $request)
    {
        try {
            $search = $request->q;
            $businessUnitId = $request->business_unit_id;

            $query = StaffDepartment::query()
                ->select('id', 'name')
                ->where('business_unit_id', $businessUnitId);

            if (!empty($search)) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            }

            $departments = $query->orderBy('name', 'asc')->get();

            $data = $departments->map(function ($dept) {
                return [
                    'id'   => $dept->id,
                    'name' => $dept->name
                ];
            });

            return response()->json($data);

        } catch (\Exception $e) {
            Log::error('Error::HUMAN_CAPITAL_STAFF_DEPARTMENT_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return response()->json([], 500);
        }
    }

    public function postStaffDepartment(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'business_unit_id' => 'required|exists:business_units,id'
            ]);

            $department = StaffDepartment::firstOrCreate(
                [
                    'name' => $request->name,
                    'business_unit_id' => $request->business_unit_id
                ]
            );

            return response()->json([
                'id' => $department->id,
                'name' => $department->name
            ]);

        } catch (\Exception $e) {
            Log::error('Error::HUMAN_CAPITAL_STAFF_DEPARTMENT_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return response()->json(['error' => 'Unable to save department'], 500);
        }
    }


}
