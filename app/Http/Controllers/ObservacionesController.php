<?php

namespace App\Http\Controllers;
use App\Observaciones;
use Illuminate\Http\Request;

class ObservacionesController extends Controller
{

    public function index(Request $request)
    {  
        $obs = Observaciones::all();
        if($request->ajax()){
            foreach ($obs as $agg){
                $agg->recepcion;
            }
            return $obs;
        }else{
            return  response()->json($obs);
        }
    }

    public function store(Request $request)
    {
        $obs = new Observaciones();
        $obs->obsrv = $request->obsrv;
        $obs->recp_id = $request->recp_id;
        $obs->save();

        
        return  response()->json($obs);
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
        $obs = Observaciones::find($id);
        $obs->obsrv = $request->obsrv;
        $obs->save();
        return  response()->json($obs);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obs = Observaciones::find($id);
        $obs->delete();
        return  response()->json($obs);
      
    }


}
