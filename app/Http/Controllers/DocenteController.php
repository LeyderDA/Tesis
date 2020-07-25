<?php

namespace App\Http\Controllers;
use App\Persona;
use App\Docente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index(Request $request)
    {  
        $docentes = Docente::all();
        if($request->ajax()){
            foreach ($docentes as $doc){
                $doc->persona;
            }
            return $docentes;
        }else{
            return  response()->json($docentes);
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
        $doc=new Docente();
        $doc->per_id=$request->per_id;
        $doc->save();
        return  response()->json($doc);

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
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pers = Docente::find($id);
        $pers->delete();
        return  response()->json($pers);
      
    }
    public function buscar($id)
    {   
        $est = Docente::where("id",$id)->get();
        
            return  $est;
        
    }

}
