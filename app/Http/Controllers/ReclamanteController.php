<?php

namespace App\Http\Controllers;

use App\Reclamante;
use Illuminate\Http\Request;

class ReclamanteController extends Controller
{
    public function index(Request $request)
    {  
        $docentes = Reclamante::all();
        if($request->ajax()){
            foreach ($docentes as $doc){
                $doc->persona;
            }
            return $docentes;
        }else{
            return  response()->json($docentes);
        }
    }


    public function store(Request $request)
    {
        $re = new Reclamante();
        $re->enfodifervictima = $request->enfodifervictima;
        $re->genevictima= $request->genevictima;
        $re->edadvictima= $request->edadvictima;
        $re->discapavictima= $request->discapavictima;
        $re->estravictima= $request->estravictima;
        $re->embaravictima= $request->embaravictima;
        $re->grupetnicovictima= $request->grupetnicovictima;
        $re->persoentidreclama= $request->persoentidreclama;
        $re->per_id= $request->per_id;
        $re->save();
        $re->persona;
        return  response()->json($re);
    }

    public function buscar($id)
    {   
        $est = Reclamante::where("id",$id)->get();
        
            return  $est;
        
    }

}
