<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('data_barang.index');
});
