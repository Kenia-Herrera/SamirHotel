<?php
namespace App\Http\Controllers;

use App\Models\Galeria; 
use Illuminate\Http\Request;

class GaleriaController extends Controller
{
    public function index()
    {
        
        $galeria = Galeria::all();
        
        return view('galeria', compact('galeria'));
    }
}
