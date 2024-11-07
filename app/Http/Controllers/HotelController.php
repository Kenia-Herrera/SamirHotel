<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function hotel()
    {
        return view('hotel'); // Asegúrate de que el nombre coincide con el archivo blade `hotel.blade.php`
    }

    public function contactos()
    {
        return view('contactos'); // Asegúrate de que el nombre coincide con el archivo blade `contacto.blade.php`
    }

    // Método para manejar el formulario de calificación
    public function submitReview(Request $request)
    {
        // Aquí puedes procesar la calificación del usuario
        // Guardar en la base de datos, por ejemplo
    }

    // Método para manejar el formulario de contacto
    public function submitContact(Request $request)
    {
        // Aquí puedes procesar el mensaje de contacto
        // Guardar en la base de datos o enviar un correo, por ejemplo
    }
}

