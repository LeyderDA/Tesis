<?php

namespace App\Http\Controllers;

use App\Recepcion;
use App\Persona;
use App\UsuRecep;
use App\Nota;
use App\User;
use App\Area;
use App\RespaldoRecepciones;
use App\HistorialRecepciones;
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
        'reclamantes.email',
        'personas.cedula',
        'personas.prinom',
        'personas.segnom',
        'personas.priape',
        'personas.segape',
        'areas.nombre'
        )
        ->orderBy('recepciones.id', 'asc')
        ->where('recepciones.estado','=',1)
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
        'users.email',
        'personas.cedula',
        'personas.prinom',
        'personas.segnom',
        'personas.priape',
        'personas.segape',
        'personas.tel',
        'personas.direc',
        'areas.nombre'
        )
        ->orderBy('recepciones.id', 'asc')
        ->where('usurecep.usu_id','=',$id)
        ->where('recepciones.estado','=',1)
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
        'reclamantes.email',
        'personas.cedula',
        'personas.prinom',
        'personas.segnom',
        'personas.priape',
        'personas.segape',
        'areas.nombre'
        )
        ->orderBy('recepciones.id', 'asc')
        ->where('recepciones.usu_id','=',$id)
        ->where('recepciones.estado','=',1)        
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
        $re->instjuri = $request->instjuri;
        $re->tramitejuri = $request->tramitejuri;
        $re->estado = $request->estado;
        $re->recla_id = $request->recla_id;
        $re->save();
        $re->reclamante;
        $re->area;
        return  response()->json($re);
    }

    public function updateArea(Request $request, $id)
    {
        $re = Recepcion::find($id);     
        $re->area_id = $request->area_id;
        $re->save();
        $re->reclamante;
        $re->area;
        return  response()->json($re);
    }

    public function updateRECLA(Request $request, $id)
    {
        $re = Recepcion::find($id);     
        $re->recla_id = $request->recla_id;
        $re->save();       
        return  response()->json($re);
    }

    public function updateABOGADO(Request $request, $id)
    {
        $re = Recepcion::find($id);     
        $re->usu_id = $request->usu_id;
        $re->notpricort = $request->notpricort;
        $re->notsegcort = $request->notsegcort;
        $re->nottercort = $request->nottercort;
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
        $re->instjuri = $request->instjuri;
        $re->tramitejuri = $request->tramitejuri;
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

    

    public function MostrarR($id)
    {
        $usurecep = UsuRecep::join("recepciones","recepciones.id","=","usurecep.recp_id")
        ->join("users","users.id","=","usurecep.usu_id")
        ->join("personas","users.per_id","=","personas.id")
        ->select('personas.cedula',
        'personas.prinom',
        'personas.segnom',
        'personas.priape',
        'personas.segape','users.*')
        ->where("recepciones.id","=",$id) 
        ->where("users.rol_id","=",2)      
        ->get(); 
        return  $usurecep;   
    }

    public function MostrarDOC($id)
    {
        $usurecep = UsuRecep::join("recepciones","recepciones.id","=","usurecep.recp_id")
        ->join("users","users.id","=","usurecep.usu_id")
        ->join("personas","users.per_id","=","personas.id")
        ->select('personas.cedula',
        'personas.prinom',
        'personas.segnom',
        'personas.priape',
        'personas.segape','users.*')
        ->where("recepciones.id","=",$id) 
        ->where("users.rol_id","=",4)      
        ->get(); 
        return  $usurecep;   
    }


    public function MostraESTUDIANTE($id)
    {
        $estudiante = Recepcion::join("users","users.id","=","recepciones.usu_id")
        ->join("personas","users.per_id","=","personas.id")
        ->select('personas.*')
        ->where("recepciones.id","=",$id) 
        ->where("users.rol_id","=",3)      
        ->get(); 
        return  $estudiante;   
    }

    public function storeRespaldo(Request $request)
    {
        $re = new RespaldoRecepciones();
        $re->id_recp = $request->id_recp;
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
        $re->usuario = $request->usuario;
        $re->reclamante = $request->reclamante;
        $re->area = $request->area;
        $re->save();       
        return  response()->json($re);
    }
    public function storeHistorial(Request $request)
    {
        $re = new HistorialRecepciones();
        $re->id_recp = $request->id_recp;
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
        $re->usuario = $request->usuario;
        $re->reclamante = $request->reclamante;
        $re->instjuri = $request->instjuri;
        $re->tramitejuri = $request->tramitejuri;
        $re->area = $request->area;
        $re->save();       
        return  response()->json($re);
    }
    

    public function mostrarArchivosRoles($fecha_ini,$fecha_fin)
    { 
        $FechaIni= $fecha_ini;
        $FechaFin= $fecha_fin;
        return view('RecepcionesRango',compact('FechaIni'),compact('FechaFin'));
      
    
    }

}
