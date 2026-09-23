<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use Illuminate\Http\Request;

class AprendizController extends Controller
{


    public function index()
    {
        return Aprendiz::all();
    }



    public function store(Request $request)
    {
        return Aprendiz::create($request->all());
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