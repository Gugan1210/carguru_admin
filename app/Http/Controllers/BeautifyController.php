<?php

namespace App\Http\Controllers;

use App\Models\BeautifyManagement;
use App\Models\CarInfo;
use App\Models\CarSelectedPromos;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BeautifyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
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
            $carSeleted = CarSelectedPromos::with('carDetail', 'getCarDiscount')->findOrFail($id);
            // dd($carSeleted);
            $carbeautify = BeautifyManagement::where('car_detail_id', $carSeleted->car_detail_id)->first();

            return view('marketing.beautify.edit', compact('carSeleted', 'carbeautify'));
        } catch (Exception $e) {
            Log::error(message: 'Error::BEAUTIFY_CAR_EDIT, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'promotion_id' => 'required',
            'car_detail_id' => 'required',
        ]);
        // dd($request->all());
        try {
            if (!empty($request->file('front_45'))) {
                $inputs['front_45'] = $request->file('front_45')->store('images', 'public');
            }
            if (!empty($request->file('back_45'))) {
                $inputs['back_45'] = $request->file('back_45')->store('images', 'public');
            }
            if (!empty($request->file('front_view'))) {
                $inputs['front_view'] = $request->file('front_view')->store('images', 'public');
            }
            if (!empty($request->file('back_view'))) {
                $inputs['back_view'] = $request->file('back_view')->store('images', 'public');
            }
            if (!empty($request->file('side'))) {
                $inputs['side'] = $request->file('side')->store('images', 'public');
            }
            if (!empty($request->file('interior_front'))) {
                $inputs['interior_front'] = $request->file('interior_front')->store('images', 'public');
            }
            if (!empty($request->file('interior_back'))) {
                $inputs['interior_back'] = $request->file(key: 'interior_back')->store('images', 'public');
            }
            if (!empty($request->file('dashboard'))) {
                $inputs['dashboard'] = $request->file('dashboard-img')->store('images', 'public');
            }
            if (!empty($request->file('speedometer'))) {
                $inputs['speedometer'] = $request->file('speedometer')->store('images', 'public');
            }
            if (!empty($request->file('gear'))) {
                $inputs['gear'] = $request->file('gear')->store('images', 'public');
            }
            if (!empty($request->file('engine'))) {
                $inputs['engine'] = $request->file('engine')->store('images', 'public');
            }
            if (!empty($request->file('tyre'))) {
                $inputs['tyre'] = $request->file('tyre')->store('images', 'public');
            }
            if (!empty($request->file('360_video'))) {
                $inputs['video_360'] = $request->file('360_video')->store('images', 'public');
            }
            if (!empty($request->file('others'))) {
                $inputs['others'] = $request->file('others')->store('images', 'public');
            }
            if (!empty($request->file('car_video'))) {
                $inputs['car_video'] = $request->file('car_video')->store('images', 'public');
            }

            // dd($inputs);
            $carBeautify = BeautifyManagement::where('car_detail_id', $request->car_detail_id)->first();
            // dd($carBeautify);
            $carBeautify->update($inputs);

            return redirect()->route('beautify.edit', $id)->with('success', 'Beautify Updated successfully');
        } catch (Exception $e) {
            Log::error(message: 'Error::BEAUTIFY_CAR_UPDATE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
