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



    public function show($id)
    {
        return Aprendiz::find($id);
    }



    public function update(Request $request, $id)
    {

        $aprendiz = Aprendiz::find($id);

        $aprendiz->update($request->all());

        return $aprendiz;

    }



    public function destroy($id)
    {

        Aprendiz::destroy($id);

        return response()->json([
            "mensaje"=>"Aprendiz eliminado correctamente"
        ]);

    }


}