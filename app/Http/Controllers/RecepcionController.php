<?php

namespace App\Http\Controllers;

use App\Recepcion;
use App\Persona;
use App\UsuRecep;
use App\Nota;
use App\User;
use App\Area;
use App\Http\Controllers\request_id;
use Illuminate\Http\Request;

class RecepcionController extends Controller
{

    public function index(Request $request)
    {
        
        $id = (new request_id)->get_id();
        $date = UsuRecep::all()->where('usu_id',$id);
        
        $recepcion = Recepcion::join("usurecep","recepciones.id","=","usurecep.recp_id")
        ->join("reclamantes","recepciones.recla_id","=","reclamantes.id")
        ->join("personas","reclamantes.per_id","=","personas.id")
        ->join("areas","recepciones.area_id","=","areas.id")
        ->select('recepciones.*', 
        'reclamantes.enfodifervictima',
        'reclamantes.genevictima',
        'reclamantes.edadvictima',
        'reclamantes.discapavictima',
        'reclamantes.estravictima',
        'reclamantes.embaravictima',
        'reclamantes.grupetnicovictima',
        'reclamantes.persoentidreclama',
        'personas.cedula',
        'personas.prinom',
        'personas.segnom',
        'personas.priape',
        'personas.segape',
        'areas.nombre'
        )
        ->orderBy('recepciones.id', 'asc')
        ->where('usurecep.usu_id','=',$id)
        ->get();

                      if ($request->ajax()) {
                          foreach ($recepcion as $rec) {                        
                              $rec->reclamante;
                              $rec->area;
                              $rec->persona;                        
                          }
                          return $recepcion;
                      } else {
                          return  response()->json($recepcion);
                      }   
    }
    public function index2(Request $request)
    {  
        $notas = Recepcion::join("usurecep","usurecep.recp_id","=","recepciones.id")
        ->join("users","usurecep.usu_id","=","users.id")   
        ->join("personas","users.per_id","=","personas.id")
        ->select(
        'personas.*'
        )
        ->where('users.rol_id','=',3)
        ->get();
        if($request->ajax()){
            foreach ($notas as $agg){
                $agg->personas;
            }
            return $notas;
        }else{
            return  response()->json($notas);
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
        $re->estado = $request->estado;
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
        $re->estado = $request->estado;
        $re->recla_id = $request->recla_id;
        $re->area_id = $request->area_id;
        $re->save();
        $re->recepcion;
        $re->persona;
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

    public function qrcode($id)
    {           
      return view("qr.qrcode",compact('id','id'));  
    }

}
