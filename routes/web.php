<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\HotelController;

Route::view('/', 'inicio')->name('inicio');


// Ruta para mostrar la página de opciones donde se seleccionan las fechas
Route::get('/reservar/opciones', [ReservaController::class, 'showOptionsForm'])->name('reservar.opciones');

// Ruta para procesar las fechas seleccionadas y mostrar las habitaciones disponibles
Route::post('/reservar/disponibles', [ReservaController::class, 'showAvailableRooms'])->name('reservar.disponibles');

// Ruta para procesar la selección de habitaciones y mostrar el resumen
Route::post('/reservar/resumen', [ReservaController::class, 'showResumenForm'])->name('reservar.resumen');

// Ruta para mostrar la vista de pago con el monto total y detalles de las habitaciones seleccionadas
Route::post('/reservar/pago', [ReservaController::class, 'showPagoForm'])->name('reservar.pago');

// Ruta para confirmar el pago y registrar las habitaciones en la reserva
Route::post('/reservar/confirmar-pago', [ReservaController::class, 'confirmarPago'])->name('reservar.confirmarPago');

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
