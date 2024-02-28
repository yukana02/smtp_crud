<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\HasApiTokens;


class AuthApiController extends Controller
{
    use HasApiTokens;

    public function login(Request $request)
{
    // Validasi input
    $data = [
        'email' => 'required|email',
        'password' => 'required',
    ];
    $validator = Validator::make($request->all(), $data);
   
    if($validator->fails()){
        return response()->json([
            'status'        => false,
            'message'       => 'Proses login Gagal',
            'data'          => $validator->errors(),
        ], 400);
    } 
        
    if(!Auth::attempt($request->only('email', 'password'))){
            $status     = false;
            $message    ='Email dan Password Salah';
            return response()->json([
                'status'        => False,
                'message'       => 'Email atau Password Salah',
            ], 401);
        } 
    $datauser = User::where('email', $request->email)->first(); // Menyelesaikan query untuk mendapatkan instance pengguna
    if ($datauser) {
        return response()->json([
            'status' => true,
            'message' => 'Success Login',
            'token' => $datauser->createToken('api-login')->plainTextToken,
        ], 200);
    } 
}
    
    public function logout(Request $request)
    {
        // Mendapatkan token saat ini yang digunakan oleh pengguna
    $currentToken = $request->user()->currentAccessToken();

    // Menghapus token
    if ($currentToken instanceof PersonalAccessToken) {
        $currentToken->delete();
    }
    
    return response()->json([
        'status' => true,
        'message' => 'Logged out successfully',
    ]);
    }
}

