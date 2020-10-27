<?php

namespace App\Http\Controllers;
use App\Comentario;
use App\Foro;
use App\Http\Controllers\request_id;
use Illuminate\Http\Request;


class ComentariosController extends Controller
{
    public function store(Request $request)
    {
        $id = (new request_id)->get_id(); 
        $request = request()->except('_token');
   
        $request['usua_id'] = $id;
        $foro_id=$request['for_id'];
        Comentario::insert($request);

        $foro = Foro::findOrFail($foro_id);
        return view('Comentarios',compact('foro'));

  
    }
}
