<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKirim extends Model
{
    use HasFactory;

    //Yang Diisi
    protected $fillable = [
        'kode_pengiriman',
        'tanggal_transaksi',
        'nama_pelanggan',
        'alamat_pelanggan',
        'no_telp',
        'catatan',
        'kode_ekspedisi',
        'berat_total',
        'beli_total',
        'harga_total',
        'ongkir'
    ];
}
