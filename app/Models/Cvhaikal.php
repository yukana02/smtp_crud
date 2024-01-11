<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cvhaikal extends Model
{
    use HasFactory;

    protected $fillable =[
        
        'idpel',
        'total_bayar',
    ];
}
