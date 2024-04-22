<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Contingut;

class Curs extends Model
{
    use HasFactory;

    protected $table = 'cursos'; 

    protected $fillable = [ 
        'nom',
        'etapa', 
        'descripcio', 
        'visible', 
    ];

    
    public function continguts()
    {
        return $this->hasMany(Contingut::class, 'id_curs');
    }
}
