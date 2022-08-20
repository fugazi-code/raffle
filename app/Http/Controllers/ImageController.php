<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function show($id)
    {
        $images = Image::query()->where('prize_id', $id)->get()->toArray();

        return view('image_form', compact('id', 'images'));
    }

    public function upload(Request $request, $id)
    {
        $request->validate([
            'photo' => 'required|image',
        ]);

        $path = $request->file('photo')->store('prizes');

        Image::create([
            'prize_id' => $id,
            'path' => $path,
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $image = Image::find($id);
        Storage::delete($image->path);
        Image::destroy($id);

        return redirect()->back();
    }
}
