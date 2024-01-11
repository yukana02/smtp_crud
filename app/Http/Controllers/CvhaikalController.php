<?php

namespace App\Http\Controllers;

use App\Models\Cvhaikal;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCvhaikalRequest;
use App\Http\Requests\UpdateCvhaikalRequest;
use Illuminate\Validation\Validator;

class CvhaikalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view ('dashboard.ojek');
    }
   


    public function hitungBiaya(Request $request)
    {
        

    $request->validate([
        'order' => 'required|numeric',
        
    ]);
    $order  = $request->input('order');
    $idpel = Auth::id();
    $total_order = Cvhaikal::where('idpel', $idpel)->count();
    $jarak = $order; // Jarak dalam kilometer
    $jumlahOrder = $total_order; // Jumlah order
    
    $hargaPerKilometer = 10000;
    $potonganCustomer = 0;

        // Potongan harga berdasarkan jarak
        if ($jarak >= 100) {
            $potonganCustomer = 10;
        } elseif ($jarak >= 50) {
            $potonganCustomer = 5;
        }

        // Potongan harga tambahan untuk costumer yang order sama
        if ($jumlahOrder > 1) {
            $potonganCustomer += 20;
        }

        // Potongan harga tambahan untuk minimal 5x order
        if ($jumlahOrder >= 5) {
            $potonganCustomer += 30;
        }

        // Hitung pajak
        $pajak = 0.1;

        // Hitung total biaya
        $totalBiaya = $hargaPerKilometer * $jarak * (1 - $potonganCustomer / 100) * (1 + $pajak);


        // $total_order = Cvhaikal::count();
       
        // insert data base
        $insert = Cvhaikal::create([
            'idpel'          => $idpel,
            'total_bayar'    => $totalBiaya,
        ]);

        
        $jarak = $order; // Jarak dalam kilometer
        $jumlahOrder = $total_order; // Jumlah order
      
        return view('dashboard.biaya', compact('jarak', 'jumlahOrder', 'totalBiaya'));
        


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
    public function store(StoreCvhaikalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cvhaikal $cvhaikal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cvhaikal $cvhaikal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCvhaikalRequest $request, Cvhaikal $cvhaikal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cvhaikal $cvhaikal)
    {
        //
    }
}
