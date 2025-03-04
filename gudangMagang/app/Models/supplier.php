<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    //Yang Diisi
    protected $fillable = [
        'kode_supplier',
        'nama_supplier',
        'alamat',
        'status',
    ];
}
