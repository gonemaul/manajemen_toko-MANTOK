<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard.index');
})->name('dashboard');

Route::get('/data-barang', function () {
    return view('pages.produk.index');
})->name('data_barang');
