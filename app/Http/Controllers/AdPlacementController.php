<?php

namespace App\Http\Controllers;

use App\Models\AdPlacement;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Traits\commonTrait;

class AdPlacementController extends Controller
{
    use commonTrait;

    // LIST ALL
    public function index()
    {
        $data = AdPlacement::orderBy('id', 'desc')->get();
        return $this->sendResponse($data,'Ad Placements retrieved successfully',);
    }

    // CREATE
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:adplacement,name',
            ]);

            $create = AdPlacement::create([
                'name' => $request->name,
                'status' => $request->status ?? 1,
            ]);

            return $this->sendResponse($create, 'Ad Placement created successfully');

        } catch (ValidationException $e) {
            return $this->sendError('Validation Error', $e->errors(), 422);
        } catch (\Exception $e) {
            return $this->sendError('Something went wrong', [$e->getMessage()], 500);
        }
    }

    // SHOW SINGLE
    public function show($id)
    {
        $data = AdPlacement::find($id);
        if (!$data) {
            return $this->sendError('Ad Placement not found', [], 404);
        }

        return $this->sendResponse($data, 'Ad Placement retrieved successfully');
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $data = AdPlacement::find($id);
        if (!$data) {
            return $this->sendError('Ad Placement not found', [], 404);
        }

        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:adplacement,name,' . $id,
            ]);

            $data->update([
                'name' => $request->name,
                'status' => $request->status ?? $data->status,
            ]);

            return $this->sendResponse($data, 'Ad Placement updated successfully');

        } catch (ValidationException $e) {
            return $this->sendError('Validation Error', $e->errors(), 422);
        } catch (\Exception $e) {
            return $this->sendError('Something went wrong', [$e->getMessage()], 500);
        }
    }

    // DELETE
    public function destroy($id)
    {
        $data = AdPlacement::find($id);
        if (!$data) {
            return $this->sendError('Ad Placement not found', [], 404);
        }

        try {
            $data->delete();
            return $this->sendResponse([], 'Ad Placement deleted successfully');
        } catch (\Exception $e) {
            return $this->sendError('Something went wrong', [$e->getMessage()], 500);
        }
    }

}