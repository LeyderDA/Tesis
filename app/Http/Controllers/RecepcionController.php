<?php

namespace App\Http\Controllers;

use App\Recepcion;
use App\Persona;
use App\UsuRecep;
use App\Http\Controllers\request_id;
use Illuminate\Http\Request;

class RecepcionController extends Controller
{

    public function index(Request $request)
    {
        
        $id = (new request_id)->get_id();
        $date = UsuRecep::all()->where('usu_id',$id);
        
        $recepcion = Recepcion::join("usurecep","recepciones.id","=","usurecep.recp_id")
        ->where('usurecep.usu_id','=',$id)
        ->get();

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
        $re->recla_id = $request->recla_id;
        $re->area_id = $request->area_id;
        $re->save();
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
        $re->recla_id = $request->recla_id;
        $re->area_id = $request->area_id;
        $re->save();
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


    public function buscar($id)
    {   
        $recep = Recepcion::where("id",$id)->get();
        
            return  $recep;
        
    }
}
