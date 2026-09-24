<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use Illuminate\Http\Request;
use App\Models\Historial;

class AprendizController extends Controller
{


    public function index()
    {
        return Aprendiz::all();
    }


//FUNCION CREAR APRENDIZ Y GUARDAR EN HISTORIAL
    public function store(Request $request)
{
    $aprendiz = Aprendiz::create($request->all());

    Historial::create([
        'aprendiz_id' => $aprendiz->id,
        'accion' => 'CREADO',
        'datos' => $aprendiz->toArray()
    ]);

    return $aprendiz;
}


//FUNCION MOSTRAR APRENDIZ POR ID
    public function show($id)
    {
        return Aprendiz::find($id);
    }


//FUNCION ACTUALIZAR APRENDIZ Y GUARDAR EN HISTORIAL
    public function update(Request $request, $id)
{
    $aprendiz = Aprendiz::findOrFail($id);

    $antes = $aprendiz->toArray();

    $aprendiz->update($request->all());

    Historial::create([
        'aprendiz_id' => $aprendiz->id,
        'accion' => 'ACTUALIZADO',
        'datos' => [
            'antes' => $antes,
            'despues' => $aprendiz->fresh()->toArray()
        ]
    ]);

    return $aprendiz;
}

//FUNCION ELIMINAR APRENDIZ Y GUARDAR EN HISTORIAL

public function destroy($id)
{
    $aprendiz = Aprendiz::findOrFail($id);

    $datos = $aprendiz->toArray();

    $aprendiz->delete();

    Historial::create([
        'aprendiz_id' => $id,
        'accion' => 'ELIMINADO',
        'datos' => $datos
    ]);

    return response()->json([
        'mensaje' => 'Aprendiz eliminado correctamente'
    ]);
}


}