<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curs; // Importa el modelo Curs
use App\Models\OtroModelo; // Importa el modelo relacionado si es necesario
use Inertia\Inertia;
use Illuminate\Support\Facades\Response;
class CursosController extends Controller
{
    //

    public function gestioCursos()
    {
        
        $cursos = Curs::all();

        // Pasar los cursos a la vista 'GestioCursos'
        return Inertia::render('GestioCursos', [
            'cursos' => $cursos,
        ]);
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

        // Guarda la relación si es necesario (por ejemplo, con otro modelo)
        // $curs->otroModelo()->associate(OtroModelo::find($request->input('otro_modelo_id')));

        $curs->save(); // Guarda el nuevo objeto en la base de datos

        // Redirige de vuelta a la página de gestión de cursos
        return redirect('/gestiocursos');
    }


    public function deletecurs($cursoId)
    {
        // Busca el curso por su ID
        $curs = Curs::find($cursoId);

        // Si el curso existe, lo elimina
        if ($curs) {
            $curs->delete();
        }

        // Redirige de vuelta a la página de gestión de cursos
        return redirect('/gestiocursos');
    }

    public function togglecurs($cursoId)
    {
        // Busca el curso por su ID
        $curs = Curs::find($cursoId);

        // Si el curso existe, cambia el valor de 'visible'
        if ($curs) {
            $curs->visible = !$curs->visible;
            $curs->save();
        }

        // Redirige de vuelta a la página de gestión de cursos
        return redirect('/gestiocursos');
    }

    public function generarjson()
    {
        $cursos = Curs::all();
        $jsonData = $cursos->toJson();
        $file = 'cursos.json';
        file_put_contents($file, $jsonData);
        return response()->download($file);
    }



    public function editar($cursoId)
    {
        // Busca el curso por su ID
        $curs = Curs::find($cursoId);

        // Si el curso no existe, redirige a la página de gestión de cursos
        if (!$curs) {
            return redirect('/gestiocursos');
        }

        // Muestra la vista 'EditarCurs' con los datos del curso
        return Inertia::render('EditarCurs', [
            'curs' => $curs,
        ]);
    }
}
