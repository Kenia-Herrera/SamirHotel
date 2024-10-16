<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class opiniones extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'comentario',
        'calificacion',
        'fecha_opinion',
    ];
}
