<?php

namespace App\Http\Controllers;

use App\Gestion;
use Illuminate\Http\Request;

class GestionController extends Controller
{

    public function index(Request $request)
    {
        $gestiones = Gestion::all();
        if ($request->ajax()) {
            foreach ($gestiones as $ges) {
                $ges->recepcion;
            }
            return $gestiones;
        } else {
            return  response()->json($gestiones);
        }
    }
    public function destroy($id)
    {
        $rec = Gestion::find($id);
        $rec->delete();
        return  response()->json($rec);
    }




    public function store(Request $request)
    {
        $ges = new Gestion();
        $ges->amplhechos = $request->amplhechos;
        $ges->fechentrevasesor = $request->fechentrevasesor;
        $ges->tipotramite = $request->tipotramite;
        $ges->asuntotramite = $request->asuntotramite;
        $ges->estado = $request->estado;
        $ges->motivoarchivo = $request->motivoarchivo;
        $ges->fechaarchivo = $request->fechaarchivo;
        $ges->obsrvtramite = $request->obsrvtramite;
        $ges->actuarealizadas = $request->actuarealizadas;
        $ges->actjuridirealzadas = $request->actjuridirealzadas;
        $ges->resulactuacion = $request->resulactuacion;
        $ges->entidadelantramite = $request->entidadelantramite;
        $ges->recp_id = $request->recp_id;
        $ges->save();
        $ges->recepcion;
        return  response()->json($ges);
    }

    public function update(Request $request, $id)
    {
        $ges = Gestion::find($id);
        $ges->amplhechos = $request->amplhechos;
        $ges->fechentrevasesor = $request->fechentrevasesor;
        $ges->tipotramite = $request->tipotramite;
        $ges->asuntotramite = $request->asuntotramite;
        $ges->estado = $request->estado;
        $ges->motivoarchivo = $request->motivoarchivo;
        $ges->fechaarchivo = $request->fechaarchivo;
        $ges->obsrvtramite = $request->obsrvtramite;
        $ges->actuarealizadas = $request->actuarealizadas;
        $ges->actjuridirealzadas = $request->actjuridirealzadas;
        $ges->resulactuacion = $request->resulactuacion;
        $ges->entidadelantramite = $request->entidadelantramite;
        $ges->recp_id = $request->recp_id;
        $ges->save();
        $ges->recepcion;
        return  response()->json($ges);
    }
}
