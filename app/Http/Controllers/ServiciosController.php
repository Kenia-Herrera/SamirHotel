<?php
namespace App\Http\Controllers;

use App\Models\Servicios; 
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function index()
    {
        $servicios = Servicios::all();
        
        return view('servicios', compact('servicios')); 
    }
}
