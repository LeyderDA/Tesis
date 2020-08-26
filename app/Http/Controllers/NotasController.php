<?php

namespace App\Http\Controllers;


use App\User;
use App\Persona;
use App\Nota;
use Illuminate\Http\Request;

class NotasController extends Controller
{
    public function index(Request $request)
    {
        $nota= Nota::all();
        if($request->ajax()){
            foreach ($nota as $usua){
                $usua->usuario;
            }
            return $nota;
        }else{
            return  response()->json($nota);
        }
    
    
                      
    }

    public function store(Request $request)
    {
        $nota=new Nota();
        $nota->notapricort=$request->notapricort;
        $nota->notasegcort=$request->notasegcort;
        $nota->notateracort=$request->notateracort;
        $nota->notafinprom=$request->notafinprom;
        $nota->usu_id=$request->usu_id;
        $nota->save();
        $nota->usuario;
        return  response()->json($nota);

    }
}
