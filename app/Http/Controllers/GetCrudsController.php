<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;

class GetCrudsController extends Controller
{
    public function addData(Request $request)
    {
        // Obtindre el valor del camp "name" enviat amb la petició POST
        $name = $request->input('name');
        
        // Crear una nova instància del model Crud
        $crud = new Crud();
        
        // Assignar el valor rebut a la columna "name"
        $crud->name = $name;
        
        // Guardar el nou registre a la base de dades
        $crud->save();
        
        // Retornar a la pagina welcome
        return redirect('/');
    }

    public function getData()
    {
        // Obtenir tots els registres de la taula "cruds_table"
        $cruds = Crud::all();
        
        
        return response()->json($cruds);
    }
}
