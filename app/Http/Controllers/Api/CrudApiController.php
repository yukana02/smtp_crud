<?php

namespace App\Http\Controllers\Api;

use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CrudApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $userId = Auth::id();
        // $userId = 2;
        $data = Crud::join('users', 'users.id', '=', 'cruds.iduser')
            ->select('cruds.title', 'cruds.id')
            ->latest('cruds.created_at')
            // ->where('cruds.iduser', $userId)
            ->get();
        
        if ($data->isEmpty()){
            $message    = 'data tidak di temukan';
            $data       = null;
            $status     = 404;
        }
        else {
            $message    = 'data di temukan';
            $status     = 200;
        }
        return response()->json([
            'stauts'        =>$status,
            'message'       =>$message,
            'data'          =>$data
        ]);

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
