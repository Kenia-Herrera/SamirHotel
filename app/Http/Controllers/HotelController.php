<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\opiniones;

class HotelController extends Controller
{
    public function hotel()
    {

        $opiniones = opiniones::where('aprobado', 1)->get();
        return view('hotel',compact('opiniones')); // Asegúrate de que el nombre coincide con el archivo blade `hotel.blade.php`
    }

    public function contactos()
    {
        return view('contactos'); // Asegúrate de que el nombre coincide con el archivo blade `contacto.blade.php`
    }

    public function submitReview(Request $request)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',  // Ejemplo de rango para calificación
            'comment' => 'required|string|max:500',
        ]);

        try {
            // Crear una nueva opinión con los datos recibidos
            Opiniones::create([
                'cliente_id' => 1,
                'comentario' => $validatedData['comment'],
                'calificacion' => $validatedData['rating'],
                'aprobado' => 0, // Por defecto, no aprobada hasta que sea revisada
                'fecha_opinion' => now(), // Fecha actual
            ]);

            // Redireccionar con un mensaje de éxito
            return redirect()->back()->with('success', '¡Gracias por tu opinión! Será revisada pronto.');
        } catch (\Exception $e) {
            // Manejar cualquier error
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Método para manejar el formulario de contacto
    public function submitContact(Request $request)
    {
        // Aquí puedes procesar el mensaje de contacto
        // Guardar en la base de datos o enviar un correo, por ejemplo
    }
}

