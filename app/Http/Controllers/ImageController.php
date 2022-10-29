<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        return view('image.index');
    }

    public function show()
    {
        //get all images
    }

    public function store(Request $request)
    {
        if (!$request->has('image'))
            return response()->json(['error' => 'There is no image Uploaded ..']);

        $request->validate([
            'image' => 'required|file|image'
        ]);

        $path = $request->file('image')->store('public/images');

        if (!$path) {
            return response()->json(['error', 'The File Cant be Saved'], 500);
        }

        $uploadedFile = $request->file('image');

        $image = Image::create([
            'name' => $uploadedFile->hashName(),
            'extension' => $uploadedFile->extension(),
            'size' => $uploadedFile->getSize(),
        ]);

        return $image;
    }
}
