<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recepcion;
use App\Gestion;

class SUPERADMINController extends Controller
{
    public function indexGestion(Request $request)
    {
        $gestiones = Gestion::all();
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
        ->select('recepciones.*', 'reclamantes.*', 'personas.*')
        ->get();

                      if ($request->ajax()) {
                          foreach ($recepcion as $rec) {
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
