<?php

namespace App\Http\Controllers;

use App\Models\CarInfo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Models;
use App\Models\Make;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:model-list|model-create|model-edit|model-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:model-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:model-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:model-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        try {
            $search = $request->input('user-search') ?? '';
            if (isset($search)) {
                $data = Models::with('brand')
                    ->where(function ($query) use ($search) {
                        $query->where('model_name', 'like', "%{$search}%")
                            ->orWhere('status', 'like', "%{$search}%");
                    })
                    ->paginate(20);

            } else {
                $data = Models::with('brand')->paginate(20);
            }
            return view('mmv.models.index', compact('data'))
                ->with('i', ($request->input('page', 1) - 1) * 5);
        } catch (Exception $e) {
            Log::error('Error::MODEL_GET_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $makes = Make::all();
            return view('mmv.models.create', compact('makes'));
        } catch (Exception $e) {
            Log::error('Error::MODEL_CREATE_PAGE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'brand_id' => 'required',
                'model_name' => 'required',
                'status' => 'required',
            ]);
            $input = $request->all();
            // Save to database
            Models::create($input);

            return redirect()->route('models.index')
                ->with('success', 'Make created successfully');
        } catch (Exception $e) {
            Log::error('Error::MODEL_CREATE_STORE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
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
            $makes = Make::all();
            $model = Models::find($id);
            return view('mmv.models.edit', compact('model', 'makes'));
        } catch (Exception $e) {
            Log::error('Error::MODEL_EDIT_PAGE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $this->validate($request, [
                'brand_id' => 'required',
                'model_name' => 'required',
                'status' => 'required',
            ]);
            $input = $request->all();

            // Save to database
            $models = Models::find($id);
            $models->update($input);

            return redirect()->route('models.index')
                ->with('success', 'Model Updated successfully');
        } catch (Exception $e) {
            Log::error('Error::MODEL_EDIT_UPDATE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Models::find($id)->delete();
            return redirect()->route('models.index')
                ->with('success', 'Model deleted successfully');
        } catch (Exception $e) {
            Log::error('Error::MODEL_DELETE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function getModels(Request $request)
    {
        try {
            $search = $request->q;
            $brandId = $request->brand_id;

            $models = Models::where('brand_id', $brandId)
                ->where('model_name', 'like', "%$search%")->orderBy('model_name', 'asc')
                ->get(['id', 'model_name']);

            return response()->json($models);

        } catch (Exception $e) {
            Log::error('Error::MODEL_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
    public function postModels(Request $request)
    {
        try {
            $request->validate([
                'brand_id' => 'required|exists:makes,id',
                'model_name' => 'required|string|max:255|unique:models,model_name,NULL,id,brand_id,' . $request->brand_id,
            ]);

            $model = Models::create([
                'brand_id' => $request->brand_id,
                'model_name' => $request->model_name,
                'status' => '1',
            ]);

            return response()->json($model);

        } catch (Exception $e) {
            Log::error('Error::MODEL_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function getModelWithCategory(Request $request)
    {
        try {
            $models = CarInfo::with('getVariant.model')
                ->where('brand_id', $request->brand_id)
                ->where('car_info_category', $request->salesCategory)
                ->get()
                ->pluck('getVariant.model')
                ->unique('id')
                ->values();
            return $models;
        } catch (Exception $e) {
            Log::error('Error::MODEL_SEARCH_ADD_DATA_CATEGORY, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
}
