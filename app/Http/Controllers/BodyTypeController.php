<?php

namespace App\Http\Controllers;

use App\Models\BodyType;
use App\Traits\commonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Constants\commonConstant;

class BodyTypeController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $data = BodyType::paginate(10);
            return view('dynamic.dropdown.body_type.index', compact('data'))
                ->with('i', ($request->input('page', 1) - 1) * 10);
        } catch (Exception $e) {
            Log::error('Error::GET_BODY_TYPE_, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('dynamic.dropdown.body_type.create');
        } catch (Exception $e) {
            Log::error('Error::CREATE_BODY_TYPE_, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'status' => 'required|boolean',
        ]);

        try {
            $inputs = $request->all();
            $inputs['image'] = $request->file('image')->store('images', 'public');
            $bodyType = BodyType::create($inputs);

            return redirect()->route('body_type.index')
                ->with('success', $bodyType->name . ' Body Type created successfully');
        } catch (Exception $e) {
            Log::error('Error::STORE_BODY_TYPE_, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BodyType $bodyType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        try {
            $bodyType = BodyType::findOrFail($id);
            return view('dynamic.dropdown.body_type.edit', compact('bodyType'))->with('i', ($request->input('page', 1) - 1) * 20);
        } catch (Exception $e) {
            Log::error('Error::EDIT_BODY_TYPE_, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'status' => 'required|boolean',
        ]);

        try {
            $input = $request->all();
            $body_type = BodyType::find($id);

            // Store image in storage/app/public/images
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
            } else {
                $imagePath = $body_type->image;
            }
            $input['image'] = $imagePath;

            $body_type->update($input);

            return redirect()->route('body_type.index')->with('success', 'Body Type Updated successfully');
        } catch (Exception $e) {
            Log::error('Error::UPDATE_BODY_TYPE_, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BodyType $bodyType)
    {
        //
    }

    public function getBodyType(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_BODY_TYPE_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }

    public function postBodyType(Request $request)
    {
        try {
            $request->validate(['name' => 'required|string|max:255|unique:body_types,name']);
            return $this->postDropdownOptions($request->field_id, $request->name);
        } catch (Exception $e) {
            Log::error('Error::CAR_MAKE_BODY_TYPE_SEARCH_ADD_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
}
