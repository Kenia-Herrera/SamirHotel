<?php

namespace App\Http\Controllers;

use App\Models\TipoHabitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 

class HabitacionController extends Controller
{
    public function create()
    {
        return view('admin.crear_habitacion'); 
    }

    public function store(Request $request)
    {
        Log::info("Datos recibidos:", $request->all());
        $request->validate([
            'tipo' => 'required|string|max:50',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'imagen_url' => 'required|url', 
        ]);

        try {
            TipoHabitacion::create([
                'tipo' => $request->tipo,
                'descripcion' => $request->descripcion,
                'precio' => $request->precio,
                'imagen_url' => $request->imagen_url, 
            ]);

            Log::info("Habitación creada exitosamente.");
            return redirect()->route('habitaciones.create')->with('success', 'Habitación creada exitosamente.');
        } catch (\Exception $e) {
            Log::error("Error al crear habitación: " . $e->getMessage());
            return redirect()->route('habitaciones.create')->with('error', 'Ocurrió un error al crear la habitación. Por favor, inténtelo de nuevo.');
        }
    }

    public function index()
    {
        $habitaciones = TipoHabitacion::all(); 
        return view('habitaciones.index', compact('habitaciones')); 
    }
}
