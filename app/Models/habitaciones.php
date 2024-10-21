<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class habitaciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'descripcion',
        'disponible',
        'imagen_url',
        'precio',
        'capacidad_max_adultos',
        'capacidad_max_ninos', 
    ];
}
