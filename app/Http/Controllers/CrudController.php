<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class Crudcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view ('dashboard.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'images' => 'required|image|mimes:jpeg,jpg,png|max:2048', // Sesuaikan dengan aturan validasi gambar yang diinginkan
            
        ]);

        $title      = $request->input('title');
        $content    = $request->input('content');
        $images     = $request->file('images');
        $imagesAs   = $images->hashName();
    
        $iduser = Auth::id();

        //simpan image di directoriy
        $path = $images->storeAs('public/images',$images->hashName());
    
        // Simpan data ke dalam database
        $proses = Crud::create([
            'iduser'    => $iduser,
            'title'     => $title,
            'content'   => $content, 
            'image'     => $imagesAs,
        ]);
    
        return redirect()->route('dashboard')->with(['success' => 'Data Berhasil Disimpan!']);
    }
  
    
    

    /**
     * Display the specified resource.
     */
    public function show($id)
{
 
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $data = Crud::find($id);
        return view('dashboard.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate only if a new image is uploaded
        ]);

        $db = Crud::find($id);
        // IF USER UPLOAD NEW IMAGE
        if($request->hasFile('images')){
            $title      = $request->input('title');
            $content    = $request->input('content');
            $images     = $request->file('images');
            $imagesAs   = $images->hashName();
            //save new images
            $path = $images->storeAs('public/images',$images->hashName());
            //delete old images
            if ($db->image) {
                Storage::delete('public/images/' . $db->image);
            }
            //update on database
            $db->update([
                'title'     => $title,
                'content'   => $content,
                'image'     => $imagesAs,
            ]);
        }else{
            //user keep using old images
            $db->update([
                'title'     =>$request->input('title'),
                'content'   =>$request->input('content'),
            ]);
        }
        return redirect()->route('edit', ['id' => $db->id])->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         //get post by ID
         $db = Crud::findOrFail($id);

         //delete image
         Storage::delete('public/images/'. $db->image);
 
         //delete post
         $db->delete();
 
         //redirect to index
         return redirect()->route('dashboard')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
