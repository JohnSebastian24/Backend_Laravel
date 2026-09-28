<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use Illuminate\Http\Request;
use App\Models\Historial;

class AprendizController extends Controller
{
    // MOSTRAR TODOS LOS APRENDICES
    public function index()
    {
        return Aprendiz::all();
    }


    // CREAR APRENDIZ
    public function store(Request $request)
    {
        $aprendiz = Aprendiz::create($request->all());

        // MongoDB solamente en entorno local
        if (app()->environment('local')) {
            Historial::create([
                'aprendiz_id' => $aprendiz->id,
                'accion' => 'CREADO',
                'datos' => $aprendiz->toArray()
            ]);
        }

        return $aprendiz;
    }


    // MOSTRAR APRENDIZ POR ID
    public function show($id)
    {
        return Aprendiz::find($id);
    }


    // ACTUALIZAR APRENDIZ
    public function update(Request $request, $id)
    {
        $aprendiz = Aprendiz::findOrFail($id);

        $antes = $aprendiz->toArray();

        $aprendiz->update($request->all());

        // MongoDB solamente en entorno local
        if (app()->environment('local')) {
            Historial::create([
                'aprendiz_id' => $aprendiz->id,
                'accion' => 'ACTUALIZADO',
                'datos' => [
                    'antes' => $antes,
                    'despues' => $aprendiz->fresh()->toArray()
                ]
            ]);
        }

        return $aprendiz;
    }


    // ELIMINAR APRENDIZ
    public function destroy($id)
    {
        $aprendiz = Aprendiz::findOrFail($id);

        $datos = $aprendiz->toArray();

        $aprendiz->delete();

        // MongoDB solamente en entorno local
        if (app()->environment('local')) {
            Historial::create([
                'aprendiz_id' => $id,
                'accion' => 'ELIMINADO',
                'datos' => $datos
            ]);
        }

        return response()->json([
            'mensaje' => 'Aprendiz eliminado correctamente'
        ]);
    }
}