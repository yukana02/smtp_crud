<?php

namespace App\Http\Controllers\Api;

use Rules\Password;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterApiController extends Controller
{
    //
    public function registeruser(Request $request)
    {
        // Membuat instance model User baru
        $datauser = new User();
    
        // Aturan validasi untuk data input
        $data = [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users', 
            'password'  => ['required', Rules\Password::defaults()],
        ];
    
        // Melakukan validasi terhadap data input
        $validator = Validator::make($request->all(), $data);
    
        // Memeriksa apakah validasi gagal
        if ($validator->fails()) {
            $status     = false;
            $message    = 'Proses Validasi Gagal';
            $data       = $validator->errors();
            $resp       = 400; // Mengubah kode respons menjadi 400 karena validasi gagal
        } else {
            // Mengisi properti model dengan data dari request
            $datauser->name     = $request->name;
            $datauser->email    = $request->email;
            $datauser->password = Hash::make($request->password); // Mengenkripsi password sebelum disimpan
            
            // Menyimpan data pengguna baru ke dalam database
            if ($datauser->save()) {
                $status     = true;
                $message    = 'Berhasil Register';
                $data       = null; // Tidak ada data tambahan ketika validasi berhasil
                $resp       = 200; // Kode respons 200 ketika berhasil
            } else {
                $status     = false;
                $message    = 'Gagal menyimpan data pengguna';
                $data       = null;
                $resp       = 500; // Kode respons 500 jika terjadi kesalahan server
            }
        }
    
        // Mengembalikan respons dalam bentuk JSON
        return response()->json([
            'status'        => $status,
            'message'       => $message,
            'data'          => $data
        ], $resp);
    }
    
    
}
