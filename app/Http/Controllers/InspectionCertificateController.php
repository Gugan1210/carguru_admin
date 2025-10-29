<?php

namespace App\Http\Controllers;

use App\Models\CarDetailCategory;
use App\Models\Inpection;
use App\Models\InspectionStatus;
use Exception;
use Illuminate\Http\Request;

class InspectionCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $car_category = CarDetailCategory::all();
            $inspection_statuse = InspectionStatus::where('status', 0)->get();
            return view('cars.inspection_certificate.index', compact('car_category', 'inspection_statuse'));
        } catch (Exception $e) {

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
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'car_category' => 'required|',
    //         'status' => 'required|array',
    //         'topic' => 'required|array',
    //         'area' => 'required|array',
    //         'specific_area' => 'required|array',
    //         'reasons' => 'required|array',
    //         'notes' => 'required|array',
    //         'status_icon' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    //     ]);
    //     //dd($request->all());    // Upload file once
    //     $imagePath = $request->file('status_icon')->store('images', 'public');

    //     $statuses = $request->input('status');
    //     $topics = $request->input('topic');
    //     $areas = $request->input('area');
    //     $specific_areas = $request->input('specific_area');
    //     $reasons = $request->input('reasons');
    //     $notes = $request->input('notes');

    //     // Count of rows
    //     $rowCount = count($statuses);

    //     for ($i = 0; $i < $rowCount; $i++) {
    //         Inpection::create([
    //             'car_category' => $request->car_category,
    //             'status' => $statuses[$i] ?? 'null',
    //             'topic' => $topics[$i] ?? 'null',
    //             'area' => $areas[$i] ?? 'null',
    //             'specific_area' => $specific_areas[$i] ?? 'null',
    //             'reasons' => $reasons[$i] ?? 'null',
    //             'notes' => $notes[$i] ?? 'null',
    //             'status_icon' => $imagePath ?? 'null', // same file for all rows
    //         ]);
    //     }

    //     return redirect()->route('inspections.index')
    //         ->with('success', 'Inspection rows created successfully!');

    // }

    public function store(Request $request)
    {
        $request->validate([
            'car_category'    => 'nullable|string',
        ]);

        $data = [
            'car_category'   => $request->car_category,
            'topic'          => $request->topic ?? [],
            'area'           => $request->area ?? [],
            'specific_area'  => $request->specific_area ?? [],
            'reasons'        => $request->reasons ?? [],
            'allow_capture'  => $request->allow_capture ?? [],
        ];

        // Handle Status Icons
        $statuses = [];
        if ($request->has('status')) {
            foreach ($request->status as $groupIndex => $statusGroup) {
                $titles = $statusGroup['title'] ?? [];
                $icons  = [];

                if (isset($statusGroup['icon'])) {
                    foreach ($statusGroup['icon'] as $file) {
                        if ($file && $file->isValid()) {
                            $icons[] = $file->store('status_icons', 'public');
                        }
                    }
                }

                $statuses[$groupIndex] = [
                    'title' => $titles,
                    'icon'  => $icons,
                ];
            }
        }
        $data['status'] = $statuses;

        $inspection = Inpection::create($data);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'id'      => $inspection->id,
                'data'    => $inspection,
                'message' => 'Inspection settings saved successfully',
            ]);
        }

        return redirect()->back()->with('success', 'Inspection settings saved successfully!');
    }

    public function updatedata(Request $request){

        $inspection = Inpection::where('car_category',$request->car_category)->first();
        $states = $request->states;
        foreach ($request->new_state as $key => $value) {
            if( empty($value['title'])) continue;
            $states[] = [
                'title'=> $value['title'],
                'icon' => ''
            ];
        }
        $inspection->status = $states;
        $inspection->data = $request->items;

        $inspection->update();
         return response()->json([
                'success' => true,
                'id'      => $inspection->id,
                'data'    => $inspection,
                'message' => 'Inspection settings updated successfully',
            ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'car_category'    => 'nullable|string',
        ]);

        $inspection = Inpection::findOrFail($id);

        $data = [
            'car_category'   => $request->car_category,
            'status'         => $request->status ?? [],
            'topic'          => $request->topic ?? [],
            'area'           => $request->area ?? [],
            'specific_area'  => $request->specific_area ?? [],
            'reasons'        => $request->reasons ?? [],
            'allow_capture'  => $request->allow_capture ?? [],
        ];

        // Handle Status Icons
         $statuses = [];
        if ($request->has('status')) {
            foreach ($request->status as $groupIndex => $statusGroup) {
                $titles = $statusGroup['title'] ?? [];
                $icons  = [];

                if (isset($statusGroup['icon'])) {
                    foreach ($statusGroup['icon'] as $file) {
                        if ($file && $file->isValid()) {
                            $icons[] = $file->store('status_icons', 'public');
                        }
                    }
                }

                $statuses[$groupIndex] = [
                    'title' => $titles,
                    'icon'  => $icons,
                ];
            }
        }
        $data['status'] = $statuses;

        $inspection->update($data);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'id'      => $inspection->id,
                'data'    => $inspection,
                'message' => 'Inspection settings updated successfully',
            ]);
        }

        return redirect()->back()->with('success', 'Inspection settings updated successfully!');
   }

    public function storestatus(Request $request)
    {
        $statuses = [];

        if ($request->has('status')) {
            foreach ($request->status as $index => $statusGroup) {
                $titleArr = $statusGroup['title'] ?? [];
                $iconArr  = $statusGroup['icon'] ?? [];

                foreach ($titleArr as $key => $title) {
                    $icon = $iconArr[$key] ?? null;
                    $path = null;

                    if ($icon instanceof \Illuminate\Http\UploadedFile) {
                        $path = $icon->store('inspection_status', 'public');
                    }

                    $status = InspectionStatus::create([
                        'text'   => $title,
                        'icon'   => $path,
                        'status' => 0,
                    ]);

                    $statuses[] = $status;
                }
            }
        }

        $allStatuses = InspectionStatus::where('status', 0)->get();

        return response()->json([
            'success' => true,
            'message' => 'Statuses saved successfully',
            'statuses' => $allStatuses
        ]);
    }


   public function updatestatus(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:inspection_status,id'
        ]);

        $status = InspectionStatus::find($request->id);
        $status->status = 1;
        $status->save();

        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Inpection $inpection)
    {
        //
    }

    public function editgetdata(Request $request,Inpection $inpection)
    {        
        try {
            return response()->json($inpection);
        } catch (Exception $e) {

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,Inpection $inpection)
    {        
        try {
            return response()->json($inpection);
        } catch (Exception $e) {

        }
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Inpection $inpection)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inpection $inpection)
    {
        //
    }
}
