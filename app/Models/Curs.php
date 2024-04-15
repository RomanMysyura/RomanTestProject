<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curs extends Model
{
    use HasFactory;

    protected $table = 'cursos'; // Nombre de la tabla en la base de datos

    protected $fillable = [ // Campos que se pueden asignar masivamente
        'nom', // Nombre del curso
        'etapa', // Etapa del curso
        'descripcio', // Descripción del curso
        'visible', // Indicador de visibilidad
    ];
}
