<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function () {
    return view('index');
});

//Home
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

//Barang
Route::get('/barang', [\App\Http\Controllers\BarangController::class, 'index']);
Route::post('/barang/store', [\App\Http\Controllers\BarangController::class, 'store']);

//Barang
Route::get('/receive', [\App\Http\Controllers\ReceivingController::class, 'index']);
