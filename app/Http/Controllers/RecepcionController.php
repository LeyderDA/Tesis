<?php

namespace App\Http\Controllers;

use App\Recepcion;
use Illuminate\Http\Request;

class RecepcionController extends Controller
{
    public function store(Request $request)
    {
        $re = new Recepcion();
        $re->recepcionado = $request->recepcionado;
        $re->fecharadicado= $request->fecharadicado;
        $re->fecharecepcionado = $request->fecharecepcionado;
        $re->consultorio = $request->consultorio;
        $re->fechareparto = $request->fechareparto;
        $re->fechapublicacion = $request->fechapublicacion;
        $re->fecharetiro = $request->fecharetiro;
        $re->usu_id = $request->usu_id;
        $re->asig_id = $request->asig_id;
        $re->recep_id = $request->recep_id;
        $re->recla_id = $request->recla_id;
        $re->area_id = $request->area_id;
        $re->save();
        return  response()->json($re);
    }
}
