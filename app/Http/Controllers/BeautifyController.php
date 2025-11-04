<?php

namespace App\Http\Controllers;

use App\Models\BeautifyInspection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Traits\commonTrait;

class BeautifyController extends Controller
{
    use commonTrait;
    // List all inspections
    public function index()
    {
        try {
            Log::info('BeautifyInspection index hit');
            $inspections = BeautifyInspection::all();
            Log::info('Count: ' . $inspections->count());
            return response()->json(['success' => true, 'data' => $inspections], 200);
        } catch (\Exception $e) {
            Log::error("BEAUTIFY_INDEX_ERROR: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to fetch inspections', 'error' => $e->getMessage()], 500);
        }
    }
    // Show single inspection
    public function show($id)
    {
        try {
            $inspection = BeautifyInspection::find($id);
            if (!$inspection) {
                return response()->json(['success' => false, 'message' => 'Inspection not found'], 404);
            }
            return response()->json(['success' => true, 'data' => $inspection], 200);
        } catch (\Exception $e) {
            Log::error("BEAUTIFY_SHOW_ERROR: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to fetch inspection'], 500);
        }
    }


    public function store(Request $request)
    {

        try {
            // Get basic fields
            $request->validate([
                'promotion_id' => 'required|string',
                'car_detail_id' => 'required|string',
                'front_45' => 'nullable|file|mimes:jpg,jpeg,png',
                'back_45' => 'nullable|file|mimes:jpg,jpeg,png',
                'front_view' => 'nullable|file|mimes:jpg,jpeg,png',
                'back_view' => 'nullable|file|mimes:jpg,jpeg,png',
                'side' => 'nullable|file|mimes:jpg,jpeg,png',
                'interior_front' => 'nullable|file|mimes:jpg,jpeg,png',
                'interior_back' => 'nullable|file|mimes:jpg,jpeg,png',
                'dashboard' => 'nullable|file|mimes:jpg,jpeg,png',
                'speedometer' => 'nullable|file|mimes:jpg,jpeg,png',
                'gear' => 'nullable|file|mimes:jpg,jpeg,png',
                'engine' => 'nullable|file|mimes:jpg,jpeg,png',
                'tyre' => 'nullable|file|mimes:jpg,jpeg,png',
                'others' => 'nullable|file|mimes:jpg,jpeg,png',
                'car_video' => 'nullable|file|mimes:mp4,mov,avi',
                'video_360' => 'nullable|file|mimes:mp4,mov,avi',
            ]);

            $inputs = $request->only(['promotion_id', 'car_detail_id']);
        // Save files and store path in DB
            $fileFields = [
                'front_45', 'back_45', 'front_view', 'back_view', 'side',
                'interior_front', 'interior_back', 'dashboard', 'speedometer',
                'gear', 'engine', 'tyre', 'others', 'car_video', 'video_360'
            ];

            foreach ($fileFields as $field) {
                if ($request->hasFile($field)) {
                    // Save the file and store the path in $inputs
                    $inputs[$field] = $request->file($field)->store('images', 'public');
                }
            }


            // Create record
            $inspection = BeautifyInspection::create($inputs);
            // dd("inspection");

            return response()->json([
                'success' => true,
                'message' => 'Inspection created successfully',
                'data' => $inspection
            ], 201);

        } catch (\Exception $e) {
            Log::error("BEAUTIFY_STORE_ERROR: " . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to create inspection',
                'error' => $e->getMessage()
            ], 500);
        }

    }

    // Update inspection
    public function update(Request $request, $id)
    {
        try {
            $inspection = BeautifyInspection::find($id);
            if (!$inspection) {
                return response()->json(['success' => false, 'message' => 'Inspection not found'], 404);
            }

            $inputs = $request->only([
                'promotion_id',
                'car_detail_id'
            ]);

            // Handle file uploads
            $fileFields = [
                'front_45',
                'back_45',
                'front_view',
                'back_view',
                'side',
                'interior_front',
                'interior_back',
                'dashboard',
                'speedometer',
                'gear',
                'engine',
                'tyre',
                'others',
                'car_video',
                'video_360'
            ];

            foreach ($fileFields as $field) {
                if ($request->hasFile($field)) {
                    $inputs[$field] = $request->file($field)->store('images', 'public');
                }
            }

            $inspection->update($inputs);

            return response()->json(['success' => true, 'message' => 'Inspection updated', 'data' => $inspection], 200);
        } catch (\Exception $e) {
            Log::error("BEAUTIFY_UPDATE_ERROR: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to update inspection'], 500);
        }
    }

    // Delete inspection
    public function destroy($id)
    {
        try {
            $inspection = BeautifyInspection::find($id);
            if (!$inspection) {
                return response()->json(['success' => false, 'message' => 'Inspection not found'], 404);
            }

            $inspection->delete();
            return response()->json(['success' => true, 'message' => 'Inspection deleted'], 200);
        } catch (\Exception $e) {
            Log::error("BEAUTIFY_DELETE_ERROR: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to delete inspection'], 500);
        }
    }
}
