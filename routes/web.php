<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CvhaikalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth','verified')->group(function () {
    
    // Route::get('/dashboard', function () { return view('dashboard.dash-user');})->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/dashboard', [CvhaikalController::class, 'index'])->name('dashboard');
    Route::post('/Pesan', [CvhaikalController::class, 'hitungBiaya'])->name('hitung');
    Route::get('/back', [CvhaikalController::class, 'backdashboard'])->name('back');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    route::get('/createdata', [CrudController::class, 'index'])->name('createdata');
    route::post('/insertdata', [CrudController::class, 'store'])->name('store');
});

require __DIR__.'/auth.php';
