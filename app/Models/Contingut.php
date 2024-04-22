<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Curs;

class Contingut extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_curs',
        'titol',
        'descripcio',
    ];

    // Define la relación belongsTo con el modelo Curs
    public function curs()
    {
        return $this->belongsTo(Curs::class, 'id_curs');
    }
}
