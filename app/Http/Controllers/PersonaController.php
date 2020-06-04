<?php

namespace App\Http\Controllers;
use App\Persona;

use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {   
        $per = Persona::all();
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
        $pers=new Persona();
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

    /**
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
}
