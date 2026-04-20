<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth', 'admin')->group(function () {
    Route::resource('users', UserController::class)->except('show');
    Route::resource('barang', BarangController::class);
});

require __DIR__.'/auth.php';
