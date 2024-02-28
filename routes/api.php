<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CrudApiController;
use App\Http\Controllers\Api\RegisterApiController;
use App\Http\Controllers\Api\AuthApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
//     Route::get('data', [CrudApiController::class, 'index']);

// });

Route::get('/apiLogin',function(){
    return response()->json([
        'status'    => false,
        'message'   =>'akses di tolak',
    ],401);
})->name('apilogin');

Route::middleware('authApi')->group(function () {
    // Rute-rute API lainnya di sini
    Route::get('data', [CrudApiController::class, 'index']);
    Route::delete('logoutuser', [AuthApiController::class, 'logout']);
});

// Route::get('data', [CrudApiController::class, 'index'])->middleware('auth:sanctum');
Route::post('registeruser', [RegisterApiController::class, 'registeruser']);
Route::post('loginuser', [AuthApiController::class, 'login']);

// Route::middleware('authApi')->delete('logoutuser', [AuthApiController::class, 'logout']);


