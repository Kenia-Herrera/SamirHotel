<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservas extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'fecha_entrada',
        'fecha_salida',
        'tipo_habitacion',
        'num_huespedes',
        'fecha_reserva',
    ];
}
