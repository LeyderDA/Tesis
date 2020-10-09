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
    public function indexx(Request $request)
    {  
        $id = (new request_id)->get_id();
        $date = UsuRecep::all()->where('usu_id',$id);

        
        $recepcion = Recepcion::join("usurecep","recepciones.id","=","usurecep.recp_id")
        ->join("users","users.id","=","recepciones.usu_id")
        ->join("personas","users.per_id","=","personas.id")
        ->join("areas","recepciones.area_id","=","areas.id")
        ->select('recepciones.*', 
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


    public function indexEst(Request $request)
    {       
        $id = (new request_id)->get_id();               
        $recepcion = Recepcion::join("reclamantes","recepciones.recla_id","=","reclamantes.id")
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
        ->where('recepciones.usu_id','=',$id)        
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

        $re->notpricort = $request->notpricort;
        $re->notsegcort = $request->notsegcort;
        $re->nottercort = $request->nottercort;
        $re->usu_id = $request->usu_id;
        $re->recla_id = $request->recla_id;
        $re->area_id = $request->area_id;
        $re->save();
        $re->reclamante;
        $re->area;
        return  response()->json($re);
    }

    public function update2(Request $request, $id)
    {
        $re = Recepcion::find($id);
        $re->notpricort = $request->notpricort;
        $re->notsegcort = $request->notsegcort;
        $re->nottercort = $request->nottercort;
        $re->save();
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
        $re->notpricort = $request->notpricort;
        $re->notsegcort = $request->notsegcort;
        $re->nottercort = $request->nottercort;
        $re->usu_id = $request->usu_id;
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
