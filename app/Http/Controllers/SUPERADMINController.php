<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recepcion;
use App\Gestion;

class SUPERADMINController extends Controller
{
    public function indexGestion(Request $request)
    {
        $gestiones = Gestion::join("recepciones","gestion_tramites.recp_id","=","recepciones.id")
        ->join("areas","recepciones.area_id","=","areas.id")      
        ->select('gestion_tramites.*', 
        'recepciones.recepcionado',
        'recepciones.fecharadicado',
        'recepciones.fecharecepcionado',
        'recepciones.consultorio',
        'recepciones.fechareparto',
        'recepciones.fechapublicacion',
        'recepciones.fecharetiro',
        'recepciones.estado',
        'areas.nombre'
        )
        ->orderBy('gestion_tramites.id', 'asc')
        ->get();

        if ($request->ajax()) {
         foreach ($gestiones as $ges) {
           $ges->recepcion;
        }
        return $gestiones;
        } else {
         return  response()->jsson($gestiones);
        }

    }

    public function indexRecepcion(Request $request)
    {
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
        ->where('recepciones.estado','=',1)
        ->orderBy('recepciones.id', 'asc')
        ->get();
                      if ($request->ajax()) {
                          foreach ($recepcion as $rec) {
                            $rec->recepcion;
                            $rec->persona;   
                            $rec->reclamante;
                            $rec->area;                          
                          }
                          return $recepcion;
                      } else {
                          return  response()->json($recepcion);
                      }   
    }


    public function indexRecepcionEstado(Request $request)
    {
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
        ->where('recepciones.estado','=',0)
        ->orderBy('recepciones.id', 'asc')
        ->get();
                      if ($request->ajax()) {
                          foreach ($recepcion as $rec) {
                            $rec->recepcion;
                            $rec->persona;   
                            $rec->reclamante;
                            $rec->area;                          
                          }
                          return $recepcion;
                      } else {
                          return  response()->json($recepcion);
                      }   
    }
}
