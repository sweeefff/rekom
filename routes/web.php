<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListBarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ListProdukController;

Route::get('/', function() {
    return view('pages.home');
});
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/user/{id}', function ($id) {
    return 'User Dengan ID ' . $id;
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'Admin Dashboard';
    });
    Route::get('/users', function () {
        return 'Admin Users';
    });
});

Route::get('/kucing', function () {
    return view('kocak');
});
Route::get('/listbarang', [DataController::class, 'data']);
Route::get('/data', [ListBarangController::class, 'tampilkan']);
Route::get('/dashboard', [DashboardController::class, 'dashboard']);

Route::get('/listproduk', [ListProdukController::class, 'show'])-> name('produk.show');
Route::post('/produk/simpan', [ListProdukController::class, 'simpan'])->name('produk.simpan');