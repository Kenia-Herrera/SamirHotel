<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\HotelController;

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

# Cambiar a GaleriaController
Route::get('/galeria', [GaleriaController::class, 'index'])->name('galeria');

Route::view('/servicios', 'servicios')->name('servicios');
Route::get('/contactos', [HotelController::class, 'contactos'])->name('contactos');

Route::get('/hotel', [HotelController::class, 'hotel'])->name('hotel');

// Rutas para manejar los formularios
Route::post('/submit-review', [HotelController::class, 'submitReview'])->name('submitReview');
Route::post('/submit-contact', [HotelController::class, 'submitContact'])->name('submitContact');
