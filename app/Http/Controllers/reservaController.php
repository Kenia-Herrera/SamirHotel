<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitaciones;
use App\Models\Reservas;

class ReservaController extends Controller
{
    // Mostrar el formulario de opciones para seleccionar las fechas de entrada y salida
    public function showOptionsForm()
    {
        return view('reserva.opciones');
    }

    // Mostrar las habitaciones disponibles según las fechas seleccionadas
    public function showAvailableRooms(Request $request)
    {
        $fechaEntrada = $request->input('fecha_entrada');
        $fechaSalida = $request->input('fecha_salida');

        // Obtener los IDs de las habitaciones ocupadas en el rango de fechas seleccionado
        $reservasOcupadas = Reservas::where(function ($query) use ($fechaEntrada, $fechaSalida) {
            $query->whereBetween('fecha_entrada', [$fechaEntrada, $fechaSalida])
                ->orWhereBetween('fecha_salida', [$fechaEntrada, $fechaSalida]);
        })->pluck('habitacion_id')->toArray();

        // Obtener las habitaciones disponibles que no están en la lista de habitaciones ocupadas y ordenarlas
        $habitacionesDisponibles = Habitaciones::whereNotIn('id', $reservasOcupadas)
                                            ->orderByRaw("FIELD(tipo, 'Suite', 'Doble', 'Simple')")
                                            ->get();

        return view('reserva.opciones', compact('habitacionesDisponibles', 'fechaEntrada', 'fechaSalida'));
    }

    // Mostrar el resumen de la reserva después de seleccionar las habitaciones
    public function showResumenForm(Request $request)
    {
        $habitacionesSeleccionadas = Habitaciones::whereIn('id', $request->input('habitaciones'))->get();
        $fechaEntrada = $request->input('fecha_entrada');
        $fechaSalida = $request->input('fecha_salida');

        // Calcular el número de noches
        $startDate = new \DateTime($fechaEntrada);
        $endDate = new \DateTime($fechaSalida);
        $noches = $startDate->diff($endDate)->days;

        // Solo necesitamos asignar el precio total base de cada habitación por el número de noches
        $habitacionesConPrecios = $habitacionesSeleccionadas->map(function ($habitacion) use ($noches) {
            $habitacion->precio_total = $habitacion->precio * $noches;
            return $habitacion;
        });

        return view('reserva.reservar', compact('habitacionesConPrecios', 'fechaEntrada', 'fechaSalida', 'noches'));
    }


    public function showPagoForm(Request $request)
    {
        // Obtener los IDs de las habitaciones desde el campo `huespedes`
        $habitacionesSeleccionadas = array_keys($request->input('huespedes', []));

        if (empty($habitacionesSeleccionadas)) {
            return redirect()->back()->with('status', 'Debe seleccionar al menos una habitación.');
        }

        // Obtener las habitaciones seleccionadas de la base de datos
        $habitaciones = Habitaciones::whereIn('id', $habitacionesSeleccionadas)->get();

        // Calcular el total basado en el número de huéspedes y noches
        $total = 0;
        foreach ($habitaciones as $habitacion) {
            $numHuespedes = $request->input('huespedes.' . $habitacion->id, 1);
            $precioPorHuesped = $habitacion->precio;
            
            // Calcula el precio considerando cargos adicionales si hay más huéspedes de los permitidos
            if ($habitacion->tipo === 'Doble' && $numHuespedes > 2) {
                $precioPorHuesped += ($numHuespedes - 2) * 250;
            } else if ($habitacion->tipo === 'Suite' && $numHuespedes > 4) {
                $precioPorHuesped += ($numHuespedes - 4) * 250;
            }

            $total += $precioPorHuesped * $request->input('noches');
        }

        // Obtener otras variables del request
        $fechaEntrada = $request->input('fecha_entrada');
        $fechaSalida = $request->input('fecha_salida');
        $noches = $request->input('noches');

        // Pasar los datos a la vista de pago
        return view('reserva.pago', compact('habitaciones', 'total', 'fechaEntrada', 'fechaSalida', 'noches'));
    }

//     public function showPagoForm(Request $request)
// {
//     // Obtener los IDs de las habitaciones desde el campo `huespedes`
//     $habitacionesSeleccionadas = array_keys($request->input('huespedes', []));
//     $numHuespedes = $request->input('huespedes', []);

//     if (empty($habitacionesSeleccionadas)) {
//         return redirect()->back()->with('status', 'Debe seleccionar al menos una habitación.');
//     }

//     // Obtener las habitaciones seleccionadas de la base de datos
//     $habitaciones = Habitaciones::whereIn('id', $habitacionesSeleccionadas)->get();
//     $total = $habitaciones->sum(function($habitacion) use ($request, $numHuespedes) {
//         $habitacionId = $habitacion->id;
//         $huespedes = $numHuespedes[$habitacionId];
//         return $habitacion->precio * $request->input('noches') * $huespedes;
//     });

//     // Obtener otras variables del request
//     $fechaEntrada = $request->input('fecha_entrada');
//     $fechaSalida = $request->input('fecha_salida');
//     $noches = $request->input('noches');

//     // Pasar los datos a la vista de pago
//     return view('reserva.pago', compact('habitaciones', 'total', 'fechaEntrada', 'fechaSalida', 'noches', 'numHuespedes'));
// }

    // Confirmar el pago y registrar la reserva en la base de datos
    public function confirmarPago(Request $request)
    {
        foreach ($request->input('habitaciones') as $habitacionId) {
            Reservas::create([
                'cliente_id' => auth()->id(),
                'fecha_entrada' => $request->input('fecha_entrada'),
                'fecha_salida' => $request->input('fecha_salida'),
                'habitacion_id' => $habitacionId,
                'num_huespedes' => $request->input('num_huespedes'),
                'fecha_reserva' => now(),
            ]);
        }

        return redirect()->route('reservar.opciones')->with('success', 'Reserva confirmada con éxito.');
    }
}

