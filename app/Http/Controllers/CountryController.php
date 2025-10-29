<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Log;
use App\Traits\commonTrait;

class CountryController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // This is where you get the data from the database
        $data = Country::paginate(10); // Example: get 10 countries per page

        // Pass the $data to your Blade view
        return view('dynamic.dropdown.country.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dynamic.dropdown.country.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'iso2' => 'required|string|max:2',
            'iso3' => 'required|string|max:3',
            'phone_code' => 'required|string',
            'continent' => 'required|string',
            'status' => 'required|boolean',
        ]);
        $inputs = $request->all();
        Country::create($inputs);

        return redirect()->route('country.index')->with('success', 'Country created successfully.');
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
        $country = Country::findOrFail($id);
        return view('dynamic.dropdown.country.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'iso2' => 'required|string|size:2|unique:countries,iso2,' . $id,
            'iso3' => 'nullable|string|size:3|unique:countries,iso3,' . $id,
            'phone_code' => 'nullable|string|max:10',
            'status' => 'required|boolean',
        ]);

        $country = Country::findOrFail($id);
        $country->update($request->all());
        return redirect()->route('country.update')->with('success', 'Country updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return redirect()->route('country.destroy')->with('success', 'Country deleted successfully.');
    }

    public function getBrandCountry(Request $request)
    {
        try {
            return $this->getDropdownOptions($request->field_id, $request->q);
        } catch (Exception $e) {
            Log::error('Error::BRAND_COUNTRY_SEARCH_DATA, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
}
