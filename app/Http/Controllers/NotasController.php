<?php

namespace App\Http\Controllers;
use App\Nota;
use App\User;
use Illuminate\Http\Request;


class NotasController extends Controller
{

    public function index(Request $request)
    {
        $nota= Nota::all();
        if($request->ajax()){
            foreach ($nota as $not){
                $not->usuario;   
            }
            return $nota;
        }else{
            return  response()->json($nota);
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
        $nota->usu_id=$request->usu_id;
        $nota->save();
        $nota->usuario;
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
        $nota->notapricort = $request->notapricort;
        $nota->notasegcort = $request->notasegcort;
        $nota->notateracort = $request->notateracort;
        $nota->save();
        $nota->usuario;
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


