<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function store(Request $request)
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
        
    
        // Lakukan operasi lain yang dibutuhkan (validasi, penyimpanan gambar, dll.)
        $iduser = Auth::id();

        //simpan image di directoriy
        $imagePath  = $this->uploadImages($images);
    
        // Simpan data ke dalam database
        $proses = Crud::create([
            'iduser'    => $iduser,
            'title'     => $title,
            'content'   => $content, 
            'images'    => $imagesAs,
        ]);
    
        return redirect()->route('dashboard')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    private function uploadImages($images)
    {
        //jika hanya satu image tidak perlu menggunakn perlulangan
        $path = $images->storeAs('public/images', $images->hashName());
        return $path;
        
        // jika lebis dari satu images menggunakan array
        // $imagePaths = [];
        // foreach ($imagesAs as $image) {
        //     // Lakukan proses pengunggahan dan dapatkan path gambar
        //     $path = $image->storeAs('public/images',$image->hashName());
        //     $imagePaths[] = $path;
        // }
        // return $imagePaths;
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $data = Crud::all();
    $content = json_decode($data->content, true);

    return view('dashboard.dash-user', compact('content'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
