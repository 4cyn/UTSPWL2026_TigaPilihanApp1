<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LogUserController;
use App\Http\Controllers\LogBarangController;

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

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/log-user', [LogUserController::class, 'index'])->name('loguser.index');
    Route::get('/log-barang', [LogBarangController::class, 'index'])->name('logbarang.index');
});

require __DIR__.'/auth.php';
