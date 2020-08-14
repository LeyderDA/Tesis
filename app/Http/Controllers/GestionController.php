<?php

namespace App\Http\Controllers;
use App\Gestion;
use App\UsuRecep;
use App\Recepcion;
use App\Http\Controllers\request_id;
use Illuminate\Http\Request;

class GestionController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $id = (new request_id)->get_id();
        
        $date = UsuRecep::all()->where('usu_id',$id);

        foreach($date as $contenido){

            //----------------------------------------
            $gestiones = Gestion::all();//where('recp_id',$contenido2->id);
            if ($request->ajax()) {
             foreach ($gestiones as $ges) {
               $ges->recepcion;
            }
            return $gestiones;
            } else {
             return  response()->jsson($gestiones);
            }
            //-----------------------------------------

            $date2 = Recepcion::where('id',$contenido->recp_id);
            foreach($date2 as $contenido2){
                
                      //----------------------------------------
                      $gestiones = Gestion::all();//where('recp_id',$contenido2->id);
                      if ($request->ajax()) {
                       foreach ($gestiones as $ges) {
                         $ges->recepcion;
                      }
                      return $gestiones;
                      } else {
                       return  response()->jsson($gestiones);
                      }
                      //-----------------------------------------

            }

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
