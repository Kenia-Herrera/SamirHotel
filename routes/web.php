<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;

Route::get('/', [ReservaController::class, 'showForm']);

Route::post('/reservar', [ReservaController::class, 'store'])->name('reservar.store');
Route::get('/opciones', [ReservaController::class, 'showOptionsForm'])->middleware('verificarSesion');
Route::post('/opciones', [ReservaController::class, 'storeOptions'])->name('opciones.store')->middleware('verificarSesion');
Route::get('/pago', [ReservaController::class, 'showPaymentForm'])->middleware('verificarSesion');
Route::post('/pago', [ReservaController::class, 'storePayment'])->name('pago.store')->middleware('verificarSesion');
