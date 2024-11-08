<?php

namespace App\Http\Controllers;

use App\Models\TipoHabitacion;
use App\Models\Galeria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 

class HabitacionController extends Controller
{
    public function index()
    {
        $habitaciones = TipoHabitacion::all(); 
        
        $galeria = Galeria::all();
    
        return view('habitaciones', compact('habitaciones','galeria')); 

    }
}
