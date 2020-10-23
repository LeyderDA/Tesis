<?php

namespace App\Http\Controllers;
use App\Foro;

use Illuminate\Http\Request;

class ForosController extends Controller
{
    public function index()
    {   
        $per = Foro::all();
        return  response()->json($per);
   
      
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
            $for->save();
            return  response()->json($for);
  
    }
    public function storee(Request $request)
    {
        $image=$request->file('file');
        $name=$image->getClientOriginalName();
        $image->move(storage_path('app/public/archivos'), $name);
      
    }

    public function buscar($cedula)
    {   
        $pers = Persona::where("cedula",$cedula)->get();
        
            return  $pers;
        
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
        $pers=Persona::find($id);
        $pers->cedula=$request->cedula;
        $pers->prinom=$request->prinom;
        $pers->segnom=$request->segnom;
        $pers->priape=$request->priape;
        $pers->segape=$request->segape;
        $pers->tel=$request->tel;
        $pers->direc=$request->direc;
        $pers->save();
        return  response()->json($pers);
    }

    /**s
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pers = Persona::find($id);
        $pers->delete();
        return  response()->json($pers);
      
    }

    public function buscarced($cedula)
    {
        $pers = Persona::where("cedula","=",$cedula);
        return  response()->json($pers);

    }
}
