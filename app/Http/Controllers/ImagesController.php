<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images; // or User
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{public function store(Request $request)
{
    try {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {

            // Save file to storage/app/public/images
            $file = $request->file('image');
            $fileName = time().'_'.$file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName, 'public');

            // Save DB (example)
            $data = new Images();
            $data->image = $path;
            $data->save();

            return response()->json([
                'status' => true,
                'message' => 'Image uploaded successfully!',
                'image_url' => asset('storage/'.$path),
                'file_path_in_storage' => $path
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'No file uploaded'
        ], 400);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => $e->getMessage()
        ]);
    }
}
}
