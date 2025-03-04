<?php

use Illuminate\Support\Facades\Route;

// Route::get('/test', function () { 
//     return view('Receive.receive');
// });

//login
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'auth']);
Route::post('/registrasi', [\App\Http\Controllers\LoginController::class, 'registrasi']);

//Barang
Route::post('/barang/update/{kode_barang}', [\App\Http\Controllers\BarangController::class, 'update']);
Route::post('/barang/store', [\App\Http\Controllers\BarangController::class, 'store']);
Route::get('/barang/status/{status}/{kode_barang}', [\App\Http\Controllers\BarangController::class, 'status']);

//Kategori
Route::post('/kategori/store', [\App\Http\Controllers\KategoriController::class, 'store']);
Route::get('/kategori/status/{status}/{id}', [\App\Http\Controllers\KategoriController::class, 'status']);

//Brand
Route::post('/brand/store', [\App\Http\Controllers\BrandController::class, 'store']);
Route::get('/brand/{status}/{id}', [\App\Http\Controllers\BrandController::class, 'status']);

//Receiving
Route::get('/receiving', [\App\Http\Controllers\ReceivingController::class, 'index']);
Route::post('/receiving/supply', [\App\Http\Controllers\ReceivingController::class, 'searchsupply']);
Route::post('/receiving/barang', [\App\Http\Controllers\ReceivingController::class, 'barang'])->name('barang');
Route::get('/receiving/gudang', [\App\Http\Controllers\ReceivingController::class, 'table']);
Route::get('/receiving/save', [\App\Http\Controllers\ReceivingController::class, 'receivingStore']);

//laporan sending detail
Route::get('/sent/{kode_pengiriman}', [\App\Http\Controllers\LapSendingController::class, 'detail']);

//laporan sending detail
Route::get('/received/{kode_receive}', [\App\Http\Controllers\LapReceivingController::class, 'detail']);

//laporan sending detail
Route::post('/lapSupplier/supplier', [\App\Http\Controllers\LaporanSupplierController::class, 'cariSupplier']);
Route::get('/lapSupplier/{kode_supplier}', [\App\Http\Controllers\LaporanSupplierController::class, 'tampilBarang']);
Route::post('/lapSupplier/stok', [\App\Http\Controllers\LaporanSupplierController::class, 'caristok']);

//sending
Route::post('/sending/barang', [\App\Http\Controllers\SendingController::class, 'barang']);
Route::post('/sending/kurir', [\App\Http\Controllers\SendingController::class, 'kurir']);
Route::get('/sending/save', [\App\Http\Controllers\SendingController::class, 'sendingStore']);

//Supplier store data
Route::post('/supplier/store', [\App\Http\Controllers\SupplierController::class, 'store']);
Route::get('/supplier/status/{status}/{id}', [\App\Http\Controllers\SupplierController::class, 'status']);

//ekspedisi store data
Route::post('/ekspedisi/store', [\App\Http\Controllers\EkspedisiController::class, 'store']);
Route::get('/ekspedisi/status/{status}/{id}', [\App\Http\Controllers\EkspedisiController::class, 'status']);

//Route Group
Route::group(['middleware' => ['auth']], function () {

    //laporan Sending
    Route::get('/sent', [\App\Http\Controllers\LapSendingController::class, 'index']);

    //laporan Receiving
    Route::get('/received', [\App\Http\Controllers\LapReceivingController::class, 'index']);

    //Dashboard
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

    //View Barang
    Route::get('/barang', [\App\Http\Controllers\BarangController::class, 'index']);
    // Route::get('/barang/search', [\App\Http\Controllers\BarangController::class, 'search']);
    Route::get('/barang/{kode_barang}', [\App\Http\Controllers\BarangController::class, 'show']);
    Route::get('/barang/edit/{kode_barang}', [\App\Http\Controllers\BarangController::class, 'form']);

    //View Kategori
    Route::get('/kategori', [\App\Http\Controllers\KategoriController::class, 'index']);

    //View Brand
    Route::get('/brand', [\App\Http\Controllers\BrandController::class, 'index']);

    //View Receiving
    Route::get('/receive', [\App\Http\Controllers\ReceivingController::class, 'index']);

    //View Receiving
    Route::get('/lapSupplier', [\App\Http\Controllers\LaporanSupplierController::class, 'index']);

    //View Send
    Route::get('/sending', [\App\Http\Controllers\SendingController::class, 'index']);

    //View Supplier
    Route::get('/supplier', [\App\Http\Controllers\SupplierController::class, 'index']);
    Route::get('/supplier/search', [\App\Http\Controllers\SupplierController::class, 'search']);

    //logout
    Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout']);

    //view ekspedisi
    Route::get('/ekspedisi', [\App\Http\Controllers\EkspedisiController::class, 'index']);
});
