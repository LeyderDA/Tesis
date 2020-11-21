<?php

namespace App\Http\Controllers;
use App\Gestion;
use App\UsuRecep;
use App\Recepcion;
use App\ArchivosGestiones;
use App\RespaldoGestiones;
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

        $gestiones = Gestion::
        join("recepciones","gestion_tramites.recp_id","=","recepciones.id")
        ->join("areas","recepciones.area_id","=","areas.id")  
        ->join("usurecep","usurecep.recp_id","=","recepciones.id")    
        ->join("reclamantes","reclamantes.id","=","recepciones.recla_id") 
        ->join("personas","reclamantes.per_id","=","personas.id")       
        ->select('gestion_tramites.*', 
        'recepciones.recepcionado',
        'recepciones.fecharadicado',
        'recepciones.fecharecepcionado',
        'recepciones.consultorio',
        'recepciones.fechareparto',
        'recepciones.fechapublicacion',
        'recepciones.fecharetiro',
        'recepciones.estado',
        'areas.nombre',
        'reclamantes.enfodifervictima',
        'reclamantes.genevictima',
        'reclamantes.edadvictima',
        'reclamantes.discapavictima',
        'reclamantes.estravictima',
        'reclamantes.embaravictima',
        'reclamantes.grupetnicovictima',
        'reclamantes.persoentidreclama',
        'reclamantes.email',
        'recepciones.notpricort',
        'recepciones.notsegcort',
        'recepciones.nottercort',
        'recepciones.recla_id',
        'recepciones.usu_id',
        'recepciones.instjuri',
        'recepciones.tramitejuri',
        'areas.nombre',

        'personas.cedula',
        'personas.prinom',
        'personas.segnom',
        'personas.priape',
        'personas.segape'   
        )
        ->orderBy('gestion_tramites.id', 'asc')
        ->groupBy('gestion_tramites.id')
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
        $ges->motivoarchivo = $request->motivoarchivo;
        $ges->fechaarchivo = $request->fechaarchivo;
        $ges->obsrvtramite = $request->obsrvtramite;
        $ges->actuarealizadas = $request->actuarealizadas;
        $ges->actjuridirealzadas = $request->actjuridirealzadas;
        $ges->resulactuacion = $request->resulactuacion;
        $ges->entidadelantramite = $request->entidadelantramite;
        $ges->recp_id = $request->recp_id;
        $ges->fechpriact = $request->fechpriact;
        $ges->n_act = $request->n_act;
        $ges->n_aseso = $request->n_aseso;
        $ges->n_autor = $request->n_autor;
        $ges->asesor = $request->asesor;
        
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

    public function mostrarArchivos($id)
    { 

        $Gest= Gestion::findOrFail($id);
        return view('ArchivosGestiones',compact('Gest'));
    
    }
    public function storeRespaldo(Request $request)
    {
        $ges = new RespaldoGestiones();
        $ges->gest_id = $request->gest_id;
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
        $ges->recp_id = $request->recp_id;
        $ges->fechpriact = $request->fechpriact;
        $ges->n_act = $request->n_act;
        $ges->n_aseso = $request->n_aseso;
        $ges->n_autor = $request->n_autor;
        $ges->asesor = $request->asesor;
        
        $ges->save();

        return  response()->json($ges);
    }

}
