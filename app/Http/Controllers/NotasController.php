<?php

namespace App\Http\Controllers;
use App\Nota;
use App\User;
use Illuminate\Http\Request;


class NotasController extends Controller
{
    public function index(Request $request)
    {  
        $notas = Nota::join("usurecep","notas.recp_id","=","usurecep.recp_id")
        ->join("recepciones","usurecep.recp_id","=","recepciones.id")
        ->join("users","usurecep.usu_id","=","users.id")   
        ->join("personas","users.per_id","=","personas.id")
        ->join("areas","recepciones.area_id","=","areas.id")
        ->select('notas.*'
        ,'recepciones.recepcionado'
        ,'recepciones.fecharadicado'
        ,'recepciones.fecharecepcionado'
        ,'recepciones.consultorio'
        ,'recepciones.fechareparto'
        ,'recepciones.fechapublicacion'
        ,'recepciones.fecharetiro'
        ,'recepciones.estado'
        ,'areas.nombre'
        ,'personas.cedula'
        ,'personas.prinom'
        ,'personas.segnom'
        ,'personas.priape'
        ,'personas.segape'
        ,'personas.tel'
        ,'personas.direc'
        )
        ->where('users.rol_id','=',3)
        
        ->get();

        if($request->ajax()){
            foreach ($notas as $agg){
                $agg->recepcion;
            }
            return $notas;
        }else{
            return  response()->json($notas);
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nota=new Nota();
        $nota->notapricort=$request->notapricort;
        $nota->notasegcort=$request->notasegcort;
        $nota->notateracort=$request->notateracort;
        $nota->recp_id=$request->recp_id;
        $nota->save();
        $nota->user;
        $nota->recepcion;
        return  response()->json($nota);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        $nota = Nota::find($id);
        $nota->notapricort = $request->notapricort;
        $nota->notasegcort = $request->notasegcort;
        $nota->notateracort = $request->notateracort;
        $nota->save();
        $nota->recepcion;
        return  response()->json($nota);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notas = Nota::find($id);
        $notas->delete();
        return  response()->json($notas);
      
    }


}


