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
}
