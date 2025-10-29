<?php

namespace App\Http\Controllers;

use App\Models\BidStatusManagenmentStatement;
use App\Models\BidStatusManagenmentStatus;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Bidding;
use App\Models\Make;

class BiddingController extends Controller
{
    public function index()
    {
        try {

            return view('cars.bidding.index');
        } catch (Exception $e) {
            Log::error('Error::CAR_MARKAETING_Advertisement_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }

    }

    public function create()
    {
        try {
            $statusData = BidStatusManagenmentStatus::all();
            return view('cars.bidding.create', compact('statusData'));
        } catch (Exception $e) {
            Log::error('Error::CAR_MARKAETING_Advertisement_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'bid_session_duration' => 'nullable|integer',
            'timing_each_bid' => 'nullable|integer',
            'countdown_first_interval' => 'nullable|integer',
            'countdown_second_interval' => 'nullable|integer',
            'countdown_third_interval' => 'nullable|integer',
            'preview_before_bid' => 'nullable|string',
            'cooling_period' => 'nullable|string',
            'resbid_bid_session' => 'nullable|integer',
            'resbid_attempts' => 'nullable|integer',
            'resbid_price_reduction' => 'nullable|integer',
            // 'status' => 'nullable',
            // 'statement' => 'nullable|string',
        ]);

        // dd($request->all());
        $statusList = $request->input('status', []);
        $statementList = $request->input('statement', []);
        $uploadFiles = $request->file('upload', []);

        $mappedData = [];

        foreach ($statusList as $index => $statusId) {
            $statement = $statementList[$index] ?? null;
            $file = $uploadFiles[$index] ?? null;
            $path = null;

            if ($file) {
                // Store the file in /storage/app/public/images
                $path = $file->store('images', 'public');
            }

            $mappedData[] = [
                'status_id' => $statusId,
                'statement' => $statement,
                'icon' => $path,
            ];
        }

        $bidding = Bidding::create([
            'bid_increment' => $request->bid_increment ?? [],
            'bid_session_duration' => $request->bid_session_duration,
            'timing_each_bid' => $request->timing_each_bid,
            'countdown_first_interval' => $request->countdown_first_interval,
            'countdown_second_interval' => $request->countdown_second_interval,
            'countdown_third_interval' => $request->countdown_third_interval,
            'preview_before_bid' => $request->preview_before_bid,
            'cooling_period' => $request->cooling_period,
            'resbid_bid_session' => $request->resbid_bid_session,
            'resbid_attempts' => $request->resbid_attempts,
            'resbid_price_reduction' => $request->resbid_price_reduction,
            'bid_schedule' => $request->bid_schedule ?? [],
            'carmake' => $request->carmake ?? [],
            'deposite_value' => $request->deposite_value,
            'status_management' => $mappedData ?? [],
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'id' => $bidding->id,
                'data' => $bidding,
                'message' => 'Bidding settings saved successfully',
            ]);
        }

        return redirect()->back()->with('success', 'Bidding settings saved successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bid_session_duration' => 'nullable|integer',
            'timing_each_bid' => 'nullable|integer',
            'countdown_first_interval' => 'nullable|integer',
            'countdown_second_interval' => 'nullable|integer',
            'countdown_third_interval' => 'nullable|integer',
            'preview_before_bid' => 'nullable|string',
            'cooling_period' => 'nullable|string',
            'resbid_bid_session' => 'nullable|integer',
            'resbid_attempts' => 'nullable|integer',
            'resbid_price_reduction' => 'nullable|integer',
        ]);

        $bidding = Bidding::findOrFail($id);

        $bidding->update([
            'bid_increment' => $request->bid_increment ?? [],
            'bid_session_duration' => $request->bid_session_duration,
            'timing_each_bid' => $request->timing_each_bid,
            'countdown_first_interval' => $request->countdown_first_interval,
            'countdown_second_interval' => $request->countdown_second_interval,
            'countdown_third_interval' => $request->countdown_third_interval,
            'preview_before_bid' => $request->preview_before_bid,
            'cooling_period' => $request->cooling_period,
            'resbid_bid_session' => $request->resbid_bid_session,
            'resbid_attempts' => $request->resbid_attempts,
            'resbid_price_reduction' => $request->resbid_price_reduction,
            'bid_schedule' => $request->bid_schedule ?? [],
            'carmake' => $request->carmake ?? [],
            'deposite_value' => $request->deposite_value,
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'id' => $bidding->id,
                'data' => $bidding,
                'message' => 'Bidding settings updated successfully',
            ]);
        }

        return redirect()->back()->with('success', 'Bidding settings updated successfully!');
    }

    public function getcarmake(Request $request)
    {
        //dd('inside get_business_unit');

        try {
            $search = $request->q;

            //$query = Make::query()->select('id', 'brand_name as name');
            $query = Make::query()->selectRaw('MIN(id) as id, brand_name as name')->groupBy('brand_name');

            // If search term exists, filter
            if (!empty($search)) {
                $query->where('brand_name', 'LIKE', '%' . $search . '%');
            }

            $makes = $query->orderBy('brand_name', 'asc')->get();

            $data = $makes->map(function ($make) {
                return [
                    'id' => $make->id,
                    'name' => $make->name
                ];
            });

            return response()->json($data);

        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_SEARCH, Message: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to fetch car makes.'], 500);
        }

    }

    public function getBidStatements(Request $request)
    {
        try {
            $statement = BidStatusManagenmentStatement::where('status_id', $request->status_id)->get();
            return $statement;
        } catch (Exception $e) {
            Log::error('Error::CAR_BID_STATEMENT_GET, Message: ' . $e->getMessage());
        }
    }
}
