<?php

namespace App\Http\Controllers;

use App\Models\AdTopic;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Validation\ValidationException;
use App\Traits\commonTrait;

class AdTopicController extends Controller
{
    use commonTrait;
    public function index()
    {
        $data = AdTopic::orderBy('id', 'desc')->get();
        return $this->sendResponse($data, 'Ad Topics retrieved successfully');
    }

    // CREATE
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:adtopic,name',
                'ad_placement_id' => 'required|integer',
            ]);

            $create = AdTopic::create([
                'name' => $request->name,
                'ad_placement_id' => $request->ad_placement_id,
                'status' => $request->status ?? 1,
            ]);

            return $this->sendResponse($create, 'Ad Topic created successfully');

        } catch (ValidationException $e) {
            return $this->sendError('Validation Error', $e->errors(), 422);
        } catch (\Exception $e) {
            return $this->sendError('Something went wrong', [$e->getMessage()], 500);
        }
    }

    // SHOW SINGLE
    public function show($id)
    {
        $data = AdTopic::find($id);
        if (!$data) {
            return $this->sendError('Ad Topic not found', [], 404);
        }

        return $this->sendResponse($data, 'Ad Topic retrieved successfully');
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $data = AdTopic::find($id);
        if (!$data) {
            return $this->sendError('Ad Topic not found', [], 404);
        }

        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:adtopic,name,' . $id,
                'ad_placement_id' => 'required|integer',
            ]);

            $data->update([
                'name' => $request->name,
                'ad_placement_id' => $request->ad_placement_id,
                'status' => $request->status ?? $data->status,
            ]);

            return $this->sendResponse($data, 'Ad Topic updated successfully');

        } catch (ValidationException $e) {
            return $this->sendError('Validation Error', $e->errors(), 422);
        } catch (\Exception $e) {
            return $this->sendError('Something went wrong', [$e->getMessage()], 500);
        }
    }

    // DELETE
    public function destroy($id)
    {
        $data = AdTopic::find($id);
        if (!$data) {
            return $this->sendError('Ad Topic not found', [], 404);
        }

        try {
            $data->delete();
            return $this->sendResponse([], 'Ad Topic deleted successfully');
        } catch (\Exception $e) {
            return $this->sendError('Something went wrong', [$e->getMessage()], 500);
        }
    }
}