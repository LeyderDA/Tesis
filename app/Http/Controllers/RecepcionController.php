<?php

namespace App\Http\Controllers;

use App\Recepcion;
use App\Persona;
use Illuminate\Http\Request;

class RecepcionController extends Controller
{

    public function index(Request $request)
    {

        $recepcion = Recepcion::all();
        if ($request->ajax()) {
            foreach ($recepcion as $rec) {
                $rec->estudiante;
                $rec->docente;
                $rec->administrativo;
                $rec->reclamante;
                $rec->area;
            }
            return $recepcion;
        } else {
            return  response()->json($recepcion);
        }
    }


    public function update(Request $request, $id)
    {
        $re = Recepcion::find($id);
        $re->recepcionado = $request->recepcionado;
        $re->fecharadicado = $request->fecharadicado;
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
        $re->estudiante;
        $re->docente;
        $re->administrativo;
        $re->reclamante;
        $re->area;
        return  response()->json($re);
    }




    public function store(Request $request)
    {
        $re = new Recepcion();
        $re->recepcionado = $request->recepcionado;
        $re->fecharadicado = $request->fecharadicado;
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
        $re->estudiante;
        $re->docente;
        $re->administrativo;
        $re->reclamante;
        $re->area;
        return  response()->json($re);
    }

    public function show($id)
    {
        $pers = Persona::find($id);
        return  response()->json($pers);
    }

    public function destroy($id)
    {
        $rec = Recepcion::find($id);
        $rec->delete();
        return  response()->json($rec);
    }
}
