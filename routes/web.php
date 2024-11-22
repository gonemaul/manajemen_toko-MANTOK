<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard.index');
})->name('dashboard');

Route::get('/data-barang', function () {
    return view('pages.produk.index');
})->name('data_barang');
Route::get('/belanja', function () {
    return view('pages.belanja.index');
})->name('belanja');
Route::get('/rab', function () {
    return view('pages.RAB.index');
})->name('rab');
