<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curs; // Importa el modelo Curs
use Inertia\Inertia;

class CursosController extends Controller
{
    //

    public function gestioCursos()
    {
        return Inertia::render('GestioCursos');    
    }

    public function addcurs(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'nom' => 'required|string',
            'etapa' => 'required|string',
            'descripcio' => 'required|string',
            'visible' => 'boolean',
        ]);

        // Crea un nuevo objeto Curs con los datos del formulario
        $curs = new Curs();
        $curs->nom = $request->input('nom');
        $curs->etapa = $request->input('etapa');
        $curs->descripcio = $request->input('descripcio');
        $curs->visible = $request->input('visible', false); // Si no se proporciona el valor, se establece en falso por defecto
        $curs->save(); // Guarda el nuevo objeto en la base de datos

        // Redirige de vuelta a la página de gestión de cursos
        return redirect('/gestiocursos');
    }
}
