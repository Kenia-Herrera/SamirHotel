<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opiniones;
use App\Models\contacto; // Asegúrate de importar el modelo Contacto

class HotelController extends Controller
{
    public function hotel()
    {
        $opiniones = Opiniones::where('aprobado', 1)->get();
        return view('hotel', compact('opiniones'));
    }

    public function contactos()
    {
        return view('contactos');
    }

    public function submitReview(Request $request)
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:500',
        ]);

        try {
            Opiniones::create([
                'cliente_id' => 1,
                'comentario' => $validatedData['comment'],
                'calificacion' => $validatedData['rating'],
                'aprobado' => 0,
                'fecha_opinion' => now(),
            ]);

            return redirect()->back()->with('success', '¡Gracias por tu opinión! Será revisada pronto.');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function submitContact(Request $request)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'asunto' => 'required|string|max:255',
            'mensaje' => 'required|string|max:1000',
        ]);

        try {
            // Crear un nuevo registro de contacto en la base de datos
            contacto::create([
                'nombre' => $validatedData['nombre'],
                'correo' => $validatedData['correo'],
                'asunto' => $validatedData['asunto'],
                'mensaje' => $validatedData['mensaje'],
            ]);

            return redirect()->back()->with('success', '¡Gracias por contactarnos! Nos pondremos en contacto contigo pronto.');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
