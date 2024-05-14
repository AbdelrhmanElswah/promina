<?php

namespace App\Http\Controllers\Admin;
use App\DataTables\AlbumsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\AlbumImage;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AlbumsDataTable $albumDataTable)
    {
        
        return $albumDataTable->render('admin.gallery.index', ['title' => 'Gallery']);
    }

    public function create()
    {
        return view('admin.gallery.create',['title' => 'Create Gallery']);
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);

    $album = Album::create([
        'title' => $request->title,
    ]);

   
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            
            $imageName = time() . '_' . $image->getClientOriginalName();

            
            if ($image->move(public_path('images'), $imageName)) {
                
                AlbumImage::create([
                    'album_id' => $album->id,
                    'image' => '/images/' . $imageName, 
                ]);
            } 
        }
    } else {
        
        logger()->error('No images found in the request.');
    }

    return redirect()->route('album.index')->with('success', 'Album created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $album = Album::findOrFail($id);
        $title = 'Album Details'; 
        return view('admin.gallery.show', compact('album', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $album = Album::findOrFail($id);
        $title = 'Edit Album'; 
        return view('admin.gallery.edit', compact('album', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'new_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        
        $album->title = $request->title;
        $album->save();
    
        
        if ($request->hasFile('new_image')) {
            $newImage = $request->file('new_image');
    
            
            $newImageName = time() . '_' . $newImage->getClientOriginalName();
    
            
            if ($newImage->move(public_path('images'), $newImageName)) {
                
                $albumImage = $album->images()->first(); 
                $albumImage->image = '/images/' . $newImageName;
                $albumImage->save();
            } 
        }
    
        return redirect()->route('album.index')->with('success', 'Album updated successfully.');
    }
    

 
    public function destroy($id)
    {
       
        $album = Album::findOrFail($id);
    
       
        $album->images()->delete(); 
    
        
        if ($album->delete()) {
            return redirect()->route('album.index')->with('success', 'Album deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete album.');
        }
    }
    
}
