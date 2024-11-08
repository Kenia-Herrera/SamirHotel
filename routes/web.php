<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\ServiciosController;


Route::view('/', 'inicio')->name('inicio');


Route::get('/reservar', [ReservaController::class, 'showForm'])->name('reservar');
Route::post('/reservar', [ReservaController::class, 'store']);
Route::get('/opciones', [ReservaController::class, 'showOptionsForm'])->name('reservar.opciones');
Route::post('/opciones', [ReservaController::class, 'storeOptions']);
Route::get('/pago', [ReservaController::class, 'showPaymentForm'])->name('reservar.pago');
Route::post('/pago', [ReservaController::class, 'storePayment']);

Route::get('/habitaciones/create', [HabitacionController::class, 'create'])->name('habitaciones.create');
Route::post('/habitaciones', [HabitacionController::class, 'store'])->name('habitaciones.store');
Route::get('/habitaciones', [HabitacionController::class, 'index'])->name('habitaciones');


Route::get('/galeria', [GaleriaController::class, 'index'])->name('galeria');
Route::get('/servicios', [ServiciosController::class, 'index'])->name('servicios');


Route::view('/contactos', 'contactos')->name('contactos');
