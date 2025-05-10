<?php

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalidaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('entradas', EntradaController::class);
    Route::resource('salidas', SalidaController::class);

    Route::get('/balance', [BalanceController::class, 'index'])->name('balance.index');

    Route::get('/balance/pdf', [BalanceController::class, 'generarPDF'])->name('balance.pdf');
});

require __DIR__.'/auth.php';
