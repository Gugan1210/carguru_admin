<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class LanguageController extends Controller
{
    // List all languages
    public function index(Request $request)
    {
        try {
            $data = Language::with('country')->paginate(10);
            return view('dynamic.dropdown.language.index', compact('data'));
        } catch (Exception $e) {
            Log::error('Language Index Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load language list.');
        }
    }

    // Show create form
    public function create()
    {
        try {
            $countries = Country::all();
            return view('dynamic.dropdown.language.create', compact('countries'));
        } catch (Exception $e) {
            Log::error('Language Create Form Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load create form.');
        }
    }

    // Show edit form
    public function edit($id)
    {
        try {
            $language = Language::findOrFail($id);
            $countries = Country::all();
            return view('dynamic.dropdown.language.edit', compact('language', 'countries'));
        } catch (Exception $e) {
            Log::error('Language Edit Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load edit form.');
        }
    }

    // Store new language
    public function store(Request $request)
    {
        try {
            $request->validate([
                'country_id' => 'nullable|exists:countries,id',
                'iso2' => 'nullable|string|size:2',
                'code' => 'required|string|max:10|unique:languages,code',
                'name' => 'required|string|max:255',
                'is_default' => 'boolean',
                'status' => 'required|boolean',
            ]);

            Language::create($request->all());

            return redirect()->route('language.index')->with('success', 'Language added successfully.');
        } catch (Exception $e) {
            Log::error('Language Store Error: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Failed to create language.');
        }
    }

    // Update language
    public function update(Request $request, $id)
    {
        try {
            $language = Language::findOrFail($id);

            $validated = $request->validate([
                'country_id' => 'nullable|exists:countries,id',
                'name' => 'required|string|max:255',
                'code' => 'required|string|max:10|unique:languages,code,' . $language->id,
                'is_default' => 'nullable|boolean',
                'status' => 'required|boolean',
            ]);

            if ($request->has('is_default') && $request->is_default) {
                Language::where('is_default', true)
                    ->where('id', '!=', $language->id)
                    ->update(['is_default' => false]);

                $validated['is_default'] = true;
            } else {
                $validated['is_default'] = false;
            }

            $language->update($validated);

            return redirect()->route('language.index')->with('success', 'Language updated successfully.');
        } catch (Exception $e) {
            Log::error('Language Update Error: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Failed to update language.');
        }
    }

    // Delete language
    public function destroy($id)
    {
        try {
            $language = Language::findOrFail($id);
            $language->delete();

            return redirect()->route('language.index')->with('success', 'Language deleted successfully.');
        } catch (Exception $e) {
            Log::error('Language Delete Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete language.');
        }
    }
}