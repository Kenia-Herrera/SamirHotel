<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;

Route::get('/', [ReservaController::class, 'showForm']);

Route::get('/reservar', [ReservaController::class, 'showForm']);
Route::post('/reservar', [ReservaController::class, 'store']);
Route::get('/opciones', [ReservaController::class, 'showOptionsForm']);
Route::post('/opciones', [ReservaController::class, 'storeOptions']);
Route::get('/pago', [ReservaController::class, 'showPaymentForm']);
Route::post('/pago', [ReservaController::class, 'storePayment']);