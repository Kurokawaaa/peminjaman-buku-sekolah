<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PinjamController;

Route::get('/', function () {
    return redirect()->route('pinjam.create');
});

Route::resource('pinjam', PinjamController::class);
