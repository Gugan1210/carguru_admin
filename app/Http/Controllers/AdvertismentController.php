<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Advertisement;
use App\Models\PromoDiscount;

class AdvertismentController extends Controller
{

    public function index(Request $request)
    {
        try {
            $data = Advertisement::with('getAdPlacement', 'getAdTopic')->paginate(20);
            $ads = $data->unique('banner_id')->map(function ($item) {
                $ads = Advertisement::where('banner_id', $item->banner_id)->first('set');
                return (object) [
                    'ad_placement' => $item->getAdPlacement->name,
                    'ad_topic' => $item->ad_topic,
                    'status' => $item->status,
                    'count' => count(json_decode($ads->set, true)),
                ];
            })->values();
            return view('marketing.advertisment-promotion.index', compact('data', 'ads'))->with('i', ($request->input('page', 1) - 1) * 5);
        } catch (Exception $e) {
            Log::error('Error::CAR_MARKAETING_Advertisement_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function create()
    {
        try {
            $promotion_id = PromoDiscount::all();
            return view('marketing.advertisment-promotion.create', compact('promotion_id'));
        } catch (Exception $e) {
            Log::error('Error::CAR_MARKAETING_Advertisement_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'banner_id' => 'required',
            //'set' => 'required',
            'ad_placement' => 'required',
            'ad_topic' => 'required|unique:advertisements,ad_topic',
            'status' => 'required',
        ]);
        try {

            $sets = $request->set;
            $set = [];
            if (!empty($sets)) {
                foreach ($sets as $index => $setData) {
                    $set[$index]['banner_web'] = $setData['banner_web']->store('images', 'public');
                    $set[$index]['banner_mob'] = $setData['banner_mob']->store('images', 'public');
                    $set[$index]['banner_url'] = $setData['banner_url'] ?? '';
                }
            }

            $input['banner_id'] = $request->banner_id;
            $input['ad_placement'] = $request->ad_placement;
            $input['ad_topic'] = $request->ad_topic;
            $input['status'] = $request->status;
            $input['set'] = json_encode($set);
            $input['headline_content_text'] = $request->headline_content_text;
            $input['is_marqee'] = $request->is_marqee ?? '';
            ;
            $input['promotion_id'] = $request->promotion_id;

            $data = Advertisement::create($input);
            $response = [
                'topic' => $data->ad_topic,
                'message' => 'Banner Insert Sucessfully'
            ];
            return $response;
        } catch (Exception $e) {
            Log::error('Error::ADS_GET_STORE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'banner_id' => 'required',
            'set' => 'required|array',
            'ad_placement' => 'required',
            'ad_topic' => 'required|unique:advertisements,ad_topic,' . $id . ',banner_id', // allow same for current ID
            'status' => 'required',
        ]);

        try {
            //$advertisement = Advertisement::findOrFail($id);
            $advertisement = Advertisement::where('banner_id', $id)->firstOrFail();
            $sets = $request->set;
            $set = [];

            foreach ($sets as $index => $setData) {
                // Banner Web
                if (isset($setData['banner_web']) && $setData['banner_web'] instanceof \Illuminate\Http\UploadedFile) {
                    $set[$index]['banner_web'] = $setData['banner_web']->store('images', 'public');
                } elseif (!empty($setData['banner_web_path'])) {
                    $set[$index]['banner_web'] = $setData['banner_web_path']; // keep old image
                } else {
                    $set[$index]['banner_web'] = null;
                }

                // Banner Mobile
                if (isset($setData['banner_mob']) && $setData['banner_mob'] instanceof \Illuminate\Http\UploadedFile) {
                    $set[$index]['banner_mob'] = $setData['banner_mob']->store('images', 'public');
                } elseif (!empty($setData['banner_mob_path'])) {
                    $set[$index]['banner_mob'] = $setData['banner_mob_path'];
                } else {
                    $set[$index]['banner_mob'] = null;
                }

                $set[$index]['banner_url'] = $setData['banner_url'] ?? '';
            }

            $advertisement->update([
                'banner_id' => $request->banner_id,
                'ad_placement' => $request->ad_placement,
                'ad_topic' => $request->ad_topic,
                'status' => $request->status,
                'set' => json_encode($set),
                'headline_content_text' => $request->headline_content_text,
                'is_marqee' => $request->is_marqee,
                'promotion_id' => $request->promotion_id,
            ]);

            return [
                'topic' => $advertisement->ad_topic,
                'message' => 'Banner Updated Successfully'
            ];
        } catch (Exception $e) {
            Log::error('Error::ADS_UPDATE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function edit($id)
    {
        try {
            $ads = Advertisement::find($id);
            return view('marketing.advertisment-promotion.edit', compact('ads'));
        } catch (Exception $e) {
            Log::error('Error::CAR_MARKAETING_Advertisement_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function getBannerById(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);
        try {
            $data = Advertisement::where('id', $request->id)->first();
            if ($data) {
                $data->set = json_decode($data->set, true);
            }
            return $data;
        } catch (Exception $e) {
            Log::error('Error::CAR_MARKAETING_Advertisement_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }


    public function getBanner(Request $request)
    {
        try {
            $data = Advertisement::select('banner_web', 'banner_mob')->where('set', $request->set)->first();

            return json_encode($data);
        } catch (Exception $e) {
            Log::error('Error::ADS_GET_STORE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function preview(Request $request)
    {
        try {
            $data = Advertisement::where('banner_id', $request->baner_id)->first();
        } catch (Exception $e) {
            Log::error('Error::ADS_GET_STORE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function destroy(Request $request)
    {
        try {

        } catch (Exception $e) {
            Log::error('Error::ADS_GET_STORE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }

    }

}
