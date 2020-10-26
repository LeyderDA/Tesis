<?php

namespace App\Http\Controllers;
use App\Foro;
use App\UsuRecep; 
use App\Recepcion;
use App\Http\Controllers\request_id;

use Illuminate\Http\Request;

class ForosController extends Controller
{
    public function index(Request $request)
    {   

        $foro = Foro::all();
        if ($request->ajax()) {
            foreach ($foro as $rec) {                                        
                $rec->area;                                     
            }
            return $foro;
        } else {
            return  response()->json($foro);
        }       
    }
    public function indexEst(Request $request)
    {   
        $foro = Foro::join("areas","areas.id","=","foro.area_id")     
        ->select('foro.*')
       
        
        ->where('foro.area_id','=',2)
        ->get(); 

       
        if ($request->ajax()) {
            foreach ($foro as $rec) {                                        
                $rec->area;                                     
            }
            return $foro;
        } else {
            return  response()->json($foro);
        }     
        
         
        
    }

    public function comentarios($id)
    {
        $foro = Foro::findOrFail($id);
        return view('Comentarios',compact('foro'));
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
            $for=new Foro();
            $for->titulo=$request->titulo;
            $for->descripcion=$request->descripcion;
            $for->estadoFo=$request->estadoFo;  
            $for->archivo="storage/archivos/".$request->archivo;  
            $for->doc_id=$request->doc_id;
            $for->area_id=$request->area_id;
            $for->save();
            return  response()->json($for);
  
    }
    public function storee(Request $request)
    {
        $image=$request->file('file');
        $name=$image->getClientOriginalName();
        $image->move(storage_path('app/public/archivos'), $name);
      
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pers=Persona::find($id);
        return  response()->json($pers);
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
            $for=Foro::find($id);
            $for->titulo=$request->titulo;
            $for->descripcion=$request->descripcion;
            $for->estadoFo=$request->estadoFo;
            $for->save();
        return  response()->json($for);
    }

    /**s
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $for = Foro::find($id);
        $for->delete();
        return  response()->json($for);
      
    }

    public function buscarForo($id)
    {


        $foro = Foro::where("area_id",$id)->get();
        return  $foro;
        

    }
}
