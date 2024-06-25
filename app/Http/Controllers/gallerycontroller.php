<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class gallerycontroller extends Controller
{


    public function usergallery()
    {
        
        $gallerys = Gallery::get();
        return view('usergalleryview', compact('gallerys'));
    }

    public function index()
    {
        $gallerys = Gallery::get();
        return view('addgallery',compact('gallerys'));
    }
    


    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|mimes:png,jpg,jpeg',
            'price' => 'required|numeric'
        ]);

        $path = $request->file('photo')->store('image', 'public');

        $gallery = new Gallery();
        $gallery->file_name = $path;
        $gallery->price = $request->price;
        $gallery->save();

        return redirect()->route('view.gallery')->with('status', 'Image Uploaded Successfully.');
    }


  


    public function edit(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('editgallery', compact('gallery'));
    }



    public function update(Request $request, string $id)
    {
        $request->validate([
            'photo' => 'nullable|mimes:png,jpg,jpeg',
            'price' => 'required|numeric'
        ]);

        $gallery = Gallery::findOrFail($id);

        // Check if the user wants to delete the current image
        if ($request->has('delete_image') && $request->delete_image == true) {
            // Delete the current image from storage
            $this->deleteImageFromStorage($gallery->file_name);
            // Remove the image reference from the database
            $gallery->file_name = null;
        }


        // Handle file update if a new file is uploaded
        if ($request->hasFile('photo')) {
            // Delete the current image from storage if exists
            if ($gallery->file_name) {
                $this->deleteImageFromStorage($gallery->file_name);
            }
            // Store the new image
            $path = $request->file('photo')->store('image', 'public');
            $gallery->file_name = $path;
        }

        
        // Update other fields
        $gallery->price = $request->price;
        $gallery->save();

        return redirect()->route('view.gallery')->with('status', 'Gallery Item Updated Successfully.');
    }
    private function deleteImageFromStorage($filename)
    {
        Storage::disk('public')->delete($filename);
    }


    


    public function destroy(string $id)
    {
        $gallery = Gallery::find($id);

        $gallery->delete();
        $gallery_path = public_path("storage/").$gallery->file_name;

        if(file_exists($gallery_path))
        {
            @unlink($gallery_path);
        }
        return redirect()->route('view.gallery')->with('status', 'Image Deleted Successfully.');
    }

    public function purchasegallery(string $id)
    {
        $gallery = Gallery::find($id);

        $gallery->delete();
        $gallery_path = public_path("storage/").$gallery->file_name;

        if(file_exists($gallery_path))
        {
            @unlink($gallery_path);
        }
        return redirect()->route('user.gallery')->with('status', 'Purchase Image Successfully.');
    }

    
 
}
