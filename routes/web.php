<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\BooksController;

Route::get('/', function () {
    return redirect()->route('pinjam.create');
});

Route::resource('pinjam', PinjamController::class);

Route::get('/ajax/books', [BooksController::class, 'search'])
    ->name('ajax.books');
