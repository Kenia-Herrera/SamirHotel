<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    use HasFactory;

    
    protected $table = 'galeria' ;
    protected $fillable =[
        'categoria',
        'imagen_url',
        'descripcion',
        'fecha_subida',
    ];
}
