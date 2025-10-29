<?php

namespace App\Http\Controllers;

use App\Models\CarDetailCategory;
use App\Traits\commonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class CarDetailCategoryController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $data = CarDetailCategory::orderBy('id', 'DESC')->paginate(10);
            return view('dynamic.dropdown.DetailCategory.index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
        } catch (Exception $e) {
            Log::error('Error::CAR_DETAIL_CATEGORY_INDEX, Message: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while fetchingDetailCategory.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('dynamic.dropdown.DetailCategory.create');
        } catch (Exception $e) {
            Log::error('ERROR::CREATE_CAR_DETAIL_CATEGORY ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'key' => 'required',
            'status' => 'required|boolean',
        ]);

        try {
            $input = $request->all();
            if (isset($request->image)) {
                $input['image'] = $request->file('image')->store('images', 'public');
            }
            CarDetailCategory::create($input);
            return redirect()->route('detail_category.index')
                ->with('success', 'Detail_Category created successfully');
        } catch (Exception $e) {
            Log::error('ERROR::STORE_CAR_DETAIL_CATEGORY ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CarDetailCategory $carDetailCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $detail_category = CarDetailCategory::findOrFail($id);

            return view('dynamic.dropdown.DetailCategory.edit', compact('detail_category'));
        } catch (Exception $e) {
            Log::error('ERROR::EDIT_CAR_DETAIL_CATEGORY ' . $e->getMessage() . ' Line No: ' . $e->getLine());
            return redirect()->route('detail_category.index')->with('error', 'detail Category not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'key' => 'required',
            'status' => 'required|boolean',
        ]);

        try {
            $input = $request->all();
            $category = CarDetailCategory::find($id);
            if (isset($request->image)) {
                $input['image'] = $request->file('image')->store('images', 'public');
            }
            $category->update($input);

            return redirect()->route('detail_category.index')->with('success', 'Detail Category Updated successfully');
        } catch (Exception $e) {
            Log::error('ERROR::UPDATE_CAR_DETAIL_CATEGORY ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            CarDetailCategory::find($id)->delete();

            return redirect()->route('detail_category.index')
                ->with('success', 'Category deleted successfully.');
        } catch (Exception $e) {
            Log::error('ERROR::DELETE_CAR_DETAIL_CATEGORY' . $e->getMessage() . ' Line No: ' . $e->getLine());

            return redirect()->route('detail_category.index')->with('error', 'Failed to delete Detail Category.');
        }
    }

    public function getCarCategory(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q, 'key');
        } catch (Exception $e) {
            Log::error('Error::CAR_DETAIL_CATEGORY_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function postCarCategory(Request $request)
    {
        try {
            $request->validate(['name' => 'required|string|max:255|unique:car_detail_category,name']);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_DETAIL_CATEGORY_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

}
