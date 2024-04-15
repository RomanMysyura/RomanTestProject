<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curs; 
use App\Models\OtroModelo; 
use Inertia\Inertia;
use Illuminate\Support\Facades\Response;
class CursosController extends Controller
{

    public function gestioCursos()
    {
        
        $cursos = Curs::all();
        return Inertia::render('GestioCursos', [
            'cursos' => $cursos,
        ]);
    }

    public function gestiocursostable()
    {
   
    $cursos = Curs::where('visible', 1)->get();
    return Response::json($cursos);
    }


    public function addcurs(Request $request)
    {
        
        $request->validate([
            'nom' => 'required|string',
            'etapa' => 'required|string',
            'descripcio' => 'required|string',
            'visible' => 'boolean',
        ]);

        
        $curs = new Curs();
        $curs->nom = $request->input('nom');
        $curs->etapa = $request->input('etapa');
        $curs->descripcio = $request->input('descripcio');
        $curs->visible = $request->input('visible', false); 

        $curs->save();

        
        return redirect('/gestiocursos');
    }


    public function deletecurs($cursoId)
    {
       
        $curs = Curs::find($cursoId);

        if ($curs) {
            $curs->delete();
        }

        return redirect('/gestiocursos');
    }

    public function togglecurs($cursoId)
    {
        $curs = Curs::find($cursoId);

        if ($curs) {
            $curs->visible = !$curs->visible;
            $curs->save();
        }

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
        $curso = Curs::find($cursoId);
    
        if (!$curso) {
            
            return redirect('/gestiocursos')->with('error', 'El curso no existe.');
        }
    
        return Inertia::render('EditarCurs', [
            'curso' => $curso,
        ]);
    }
    


    public function updateCurs(Request $request)
    {
        $curso = Curs::find($request->input('curso.id'));
    
        $curso->nom = $request->input('curso.nom');
        $curso->etapa = $request->input('curso.etapa');
        $curso->descripcio = $request->input('curso.descripcio');
    
        $curso->save();
    
        return redirect('/gestiocursos')->with('success', 'Curso actualizado exitosamente.');
    }
    
}