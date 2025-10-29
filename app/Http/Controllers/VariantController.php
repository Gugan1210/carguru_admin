<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Models;
use App\Models\Make;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:variant-list|variant-create|variant-edit|variant-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:variant-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:variant-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:variant-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $search = $request->input('user-search') ?? '';
            if (isset($search)) {
                $data = Variant::with('brand', 'model')
                    ->where(function ($query) use ($search) {
                        $query->where('variant_name', 'like', "%{$search}%")
                            ->orWhere('status', 'like', "%{$search}%");
                    })
                    ->paginate(20);

            } else {
                $data = Variant::with('brand', 'model')->paginate(20);
            }

            return view('mmv.variants.index', compact('data'))
                ->with('i', ($request->input('page', 1) - 1) * 5);
        } catch (Exception $e) {
            Log::error('Error::VARIANT_GET_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $makes = Make::all();
            $models = Models::all();
            return view('mmv.variants.create', compact('makes', 'models'));
        } catch (Exception $e) {
            Log::error('Error::VARIANT_CREATE_PAGE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
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
                'model_id' => 'required',
                'variant_name' => 'required',
                'status' => 'required',
            ]);
            $input = $request->all();
            // Save to database
            Variant::create($input);

            return redirect()->route('variants.index')
                ->with('success', 'Variant created successfully');
        } catch (Exception $e) {
            Log::error('Error::VARIANT_CREATE_STORE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
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
            $models = Models::all();
            $variant = Variant::find($id);
            return view('mmv.variants.edit', compact('makes', 'models', 'variant'));
        } catch (Exception $e) {
            Log::error('Error::VARIANT_EDIT_PAGE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
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
                'model_id' => 'required',
                'variant_name' => 'required',
                'status' => 'required',
            ]);
            $input = $request->all();

            // Save to database
            $variants = Variant::find($id);
            $variants->update($input);

            return redirect()->route('variants.index')
                ->with('success', 'Variant Updated successfully');
        } catch (Exception $e) {
            Log::error('Error::VARIANT_EDIT_UPDATE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Variant::find($id)->delete();
            return redirect()->route('variants.index')
                ->with('success', 'Variant deleted successfully');
        } catch (Exception $e) {
            Log::error('Error::VARIANT_DELETE, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function getVariants(Request $request)
    {
        $search = $request->q;
        $brandId = $request->brand_id;
        $modelId = $request->model_id;

        $variants = Variant::where('brand_id', $brandId)
            ->where('model_id', $modelId)
            ->where('variant_name', 'like', "%$search%")->orderBy('variant_name', 'asc')
            ->get(['id', 'variant_name']);

        return response()->json($variants);
    }

    public function postVariant(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|exists:makes,id',
            'model_id' => 'required|exists:models,id',
            'variant_name' => 'required|string|max:255|unique:variants,variant_name,NULL,id,brand_id,' . $request->brand_id . ',model_id,' . $request->model_id,
        ]);

        $variant = Variant::create([
            'brand_id' => $request->brand_id,
            'model_id' => $request->model_id,
            'variant_name' => $request->variant_name,
            'status' => '1',
        ]);

        return response()->json($variant);
    }

}
