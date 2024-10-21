<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservas;
use App\Models\Habitaciones;
use App\Models\Pagos;

class reservaController extends Controller
{
    public function showForm()
    {
        return view('reservar');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fechaInicio' => 'required|date',
            'fechaSalida' => 'required|date|after:fechaInicio',
            'numHabitaciones' => 'required|integer|min:1',
            'numAdultos' => 'required|integer|min:1',
            'numNinos' => 'nullable|integer|min:0',
        ]);

        // Verificar disponibilidad en la tabla de reservas
        $reservasOcupadas = Reservas::where(function($query) use ($validatedData) {
            $query->whereBetween('fecha_entrada', [$validatedData['fechaInicio'], $validatedData['fechaSalida']])
                  ->orWhereBetween('fecha_salida', [$validatedData['fechaInicio'], $validatedData['fechaSalida']])
                  ->orWhere(function($query) use ($validatedData) {
                      $query->where('fecha_entrada', '<=', $validatedData['fechaInicio'])
                            ->where('fecha_salida', '>=', $validatedData['fechaSalida']);
                  });
        })->pluck('habitacion_id')->toArray();

        $habitacionesDisponibles = Habitaciones::whereNotIn('id', $reservasOcupadas)->get();

        if ($habitacionesDisponibles->count() < $validatedData['numHabitaciones']) {
            return redirect('/reservar')->with('status', 'No hay disponibilidad para las fechas seleccionadas.');
        }

        // Pasar los datos a la vista de opciones
        return view('opciones', [
            'fechaInicio' => $validatedData['fechaInicio'],
            'fechaSalida' => $validatedData['fechaSalida'],
            'numHabitaciones' => $validatedData['numHabitaciones'],
            'numAdultos' => $validatedData['numAdultos'],
            'numNinos' => $validatedData['numNinos'],
            'habitacionesDisponibles' => $habitacionesDisponibles
        ]);
    }

    public function showOptionsForm()
    {
        return view('opciones');
    }

    public function storeOptions(Request $request)
    {
        $validatedData = $request->validate([
            'habitacionSeleccionada' => 'required|array',
            'noches' => 'required|integer|min:1',
        ]);

        // Calcular el precio total
        $precioTotal = 0;
        $habitacionesSeleccionadas = Habitaciones::whereIn('id', $validatedData['habitacionSeleccionada'])->get();
        foreach ($habitacionesSeleccionadas as $habitacion) {
            $precioTotal += $habitacion->precio * $validatedData['noches'];
        }

        // Guardar el costo por noche en la sesión para usarlo en la vista de pago
        session(['costoTotal' => round($precioTotal, 2), 'costoPorNoche' => round($precioTotal / $validatedData['noches'], 2)]);

        return redirect('/pago')->with('status', 'Reserva realizada con éxito. Precio total: $' . session('costoTotal'));
    }

    public function showPaymentForm()
    {
        return view('pago');
    }

    public function storePayment(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        // Aquí puedes guardar la información de pago
        // Ejemplo:
        // $pago = new Pagos();
        // $pago->monto = session('costoPorNoche'); // Esto es un ejemplo, ajustar según tu lógica
        // $pago->cliente_id = 1; // Supongamos un cliente con ID 1
        // $pago->fecha_pago = now();
        // $pago->save();

        return redirect('/pago')->with('status', 'Pago realizado con éxito.');
    }
}




// public function store(Request $request)
// {
//     $validatedData = $request->validate([
//         'fechaInicio' => 'required|date',
//         'fechaSalida' => 'required|date|after:fechaInicio',
//         'numHabitaciones' => 'required|integer|min:1',
//         'numAdultos' => 'required|integer|min:1',
//         'numNinos' => 'nullable|integer|min:0',
//     ]);

//     // Calcular la capacidad total
//     $totalHuespedes = $validatedData['numAdultos'] + $validatedData['numNinos'];

//     // Buscar habitaciones disponibles por tipo y capacidad
//     $reservasOcupadas = Reservas::where(function($query) use ($validatedData) {
//         $query->whereBetween('fecha_entrada', [$validatedData['fechaInicio'], $validatedData['fechaSalida']])
//               ->orWhereBetween('fecha_salida', [$validatedData['fechaInicio'], $validatedData['fechaSalida']])
//               ->orWhere(function($query) use ($validatedData) {
//                   $query->where('fecha_entrada', '<=', $validatedData['fechaInicio'])
//                         ->where('fecha_salida', '>=', $validatedData['fechaSalida']);
//               });
//     })->pluck('habitacion_id')->toArray();

//     $habitacionesDisponibles = Habitaciones::whereNotIn('id', $reservasOcupadas)
//         ->where('capacidad_max_adultos', '>=', $validatedData['numAdultos'])
//         ->where('capacidad_max_ninos', '>=', $validatedData['numNinos'])
//         ->get();

//     if ($habitacionesDisponibles->count() < $validatedData['numHabitaciones']) {
//         return redirect('/reservar')->with('status', 'No hay disponibilidad para las fechas seleccionadas.');
//     }

//     // Continuar con el flujo normal
//     return view('opciones', [
//         'fechaInicio' => $validatedData['fechaInicio'],
//         'fechaSalida' => $validatedData['fechaSalida'],
//         'numHabitaciones' => $validatedData['numHabitaciones'],
//         'numAdultos' => $validatedData['numAdultos'],
//         'numNinos' => $validatedData['numNinos'],
//         'habitacionesDisponibles' => $habitacionesDisponibles
//     ]);
// }
