<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekspedisi extends Model
{
    use HasFactory;

    //Yang Diisi
    protected $fillable = [
        'kode_ekspedisi',
        'nama_ekspedisi',
        'status',
    ];
}
