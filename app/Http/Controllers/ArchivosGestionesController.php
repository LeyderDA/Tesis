<?php

namespace App\Http\Controllers;
use App\ArchivosGestiones;
use Illuminate\Http\Request;

class ArchivosGestionesController extends Controller
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

        $gestiones = Gestion::
        join("recepciones","gestion_tramites.recp_id","=","recepciones.id")
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
        ->where('recepciones.usu_id','=',$id)
        ->get();
        
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
        $arch = ArchivosGestiones::find($id);
        $arch->delete();
        return  response()->json($arch);
    }




    public function store(Request $request)
    {
        $ges = new ArchivosGestiones();
        $ges->ges_id = $request->ges_id;
        $ges->archivoGe="storage/archivosGestiones/".$request->archivoGe;  
        $ges->save();
        return  response()->json($ges);
    }

    public function storeARCH(Request $request)
    {
        $image=$request->file('file');
        $name=$image->getClientOriginalName();
        $image->move(storage_path('app/public/archivosGestiones'), $name);
      
    }

    public function update(Request $request, $id)
    {
        $ges = Gestion::find($id);
        $ges->amplhechos = $request->amplhechos;
        $ges->fechentrevasesor = $request->fechentrevasesor;
        $ges->tipotramite = $request->tipotramite;
        $ges->asuntotramite = $request->asuntotramite;
        $ges->motivoarchivo = $request->motivoarchivo;
        $ges->fechaarchivo = $request->fechaarchivo;
        $ges->obsrvtramite = $request->obsrvtramite;
        $ges->actuarealizadas = $request->actuarealizadas;
        $ges->actjuridirealzadas = $request->actjuridirealzadas;
        $ges->resulactuacion = $request->resulactuacion;
        $ges->entidadelantramite = $request->entidadelantramite;
        $ges->fechpriact = $request->fechpriact;
        $ges->n_act = $request->n_act;
        $ges->n_aseso = $request->n_aseso;
        $ges->n_autor = $request->n_autor;
        $ges->asesor = $request->asesor;
        $ges->save();
        $ges->recepcion;
        return  response()->json($ges);
    }
}
