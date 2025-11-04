<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Advertisement;
use App\Models\PromoDiscount;
use App\Traits\commonTrait;
class AdvertismentController extends Controller
{
    use commonTrait;

    // List all ads with pagination
    public function index(Request $request)
    {
        try {
            $ads = Advertisement::with(['adPlacement', 'adTopic'])
                ->paginate(10);

            return response()->json($ads);
        } catch (\Exception $e) {
            Log::error("ADS_INDEX_ERROR: " . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch advertisements'], 500);
        }
    }

    // Create new ad
    public function store(Request $request)
{
    // Validate incoming request
    $request->validate([
        'banner_id' => 'required|string',
        'ad_placement' => 'required|integer',
        'ad_topic' => 'required|integer|unique:advertisements,ad_topic',
        'set' => 'required|array', // array of banners
        'status' => 'required|boolean',
        'headline_content_text' => 'nullable|array', // array of strings
        'promotion_id' => 'nullable|integer',
        'is_marqee' => 'nullable|boolean'
    ]);

    try {
        // Create advertisement
        $ad = Advertisement::create([
            'banner_id' => $request->banner_id,
            'ad_placement' => $request->ad_placement,
            'ad_topic' => $request->ad_topic,
            'set' => $request->set, // store as array (casts handle JSON automatically)
            'status' => $request->status,
            'headline_content_text' => $request->headline_content_text ?? [],
            'promotion_id' => $request->promotion_id,
            'is_marqee' => $request->is_marqee ?? false,
        ]);

        // Load relationships for response
        $ad->load(['adPlacement', 'adTopic']);

        return response()->json([
            'message' => 'Advertisement created successfully',
            'data' => $ad
        ], 201);

    } catch (\Exception $e) {
        \Log::error("ADS_STORE_ERROR: " . $e->getMessage());

        // Return the actual exception message for debugging
        return response()->json([
            'error' => 'Failed to create advertisement',
            'message' => $e->getMessage()
        ], 500);
    }
}
public function update(Request $request, $id)
{
    try {
        $ad = Advertisement::find($id);
        if (!$ad) {
            return response()->json(['error' => 'Advertisement not found'], 404);
        }

        $request->validate([
            'banner_id' => 'required|string',
            'ad_placement' => 'required|integer',
            'ad_topic' => 'required|integer|unique:advertisements,ad_topic,' . $id,
            'set' => 'required|array',
            'status' => 'required|boolean',
            'headline_content_text' => 'nullable|array',
            'promotion_id' => 'nullable|integer',
            'is_marqee' => 'nullable|boolean'
        ]);

        $ad->update([
            'banner_id' => $request->banner_id,
            'ad_placement' => $request->ad_placement,
            'ad_topic' => $request->ad_topic,
            'set' => $request->set,
            'status' => $request->status,
            'headline_content_text' => $request->headline_content_text ?? [],
            'promotion_id' => $request->promotion_id,
            'is_marqee' => $request->is_marqee ?? false,
        ]);

        $ad->load(['adPlacement', 'adTopic']);

        return response()->json([
            'message' => 'Advertisement updated successfully',
            'data' => $ad
        ]);

    } catch (\Exception $e) {
        \Log::error("ADS_UPDATE_ERROR: " . $e->getMessage());
        return response()->json([
            'error' => 'Failed to update advertisement',
            'message' => $e->getMessage()
        ], 500);
    }
}

#delete 
public function destroy($id)
{
    try {
        $ad = Advertisement::find($id);
        if (!$ad) {
            return response()->json(['error' => 'Advertisement not found'], 404);
        }

        $ad->delete();

        return response()->json(['message' => 'Advertisement deleted successfully']);

    } catch (\Exception $e) {
        \Log::error("ADS_DELETE_ERROR: " . $e->getMessage());
        return response()->json([
            'error' => 'Failed to delete advertisement',
            'message' => $e->getMessage()
        ], 500);
    }
}

}
