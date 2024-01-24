<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashController extends Controller
{

    public function index(): View
    {
    $no = 1;
    $data = DB::table('cruds')
        ->join('users', 'users.id', '=', 'cruds.iduser')
        ->select('cruds.title','cruds.id') // atau jika Anda hanya membutuhkan beberapa kolom, Anda dapat menentukannya di sini
        ->latest('cruds.created_at') // urutkan dari yang terbaru
        ->paginate(10); // Menentukan jumlah item per halaman (misalnya, 10 item per halaman)

    return view('dashboard.dash-user', compact('data','no'));
    }

    public function cari(Request $request)
{
    $cari = $request->input('cari');

    $data = Crud::latest();

    if ($cari) {
        $data = $data->where('title', 'like', '%' . $cari . '%')->paginate(10);
    } else {
        // Jika pencarian kosong, tampilkan semua data
        $data = $data->paginate(10);
    }

    return view('dashboard.dash-user', compact('data', 'cari'));
}



}
