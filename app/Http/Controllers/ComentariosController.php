<?php

namespace App\Http\Controllers;
use App\Comentario;
use App\Foro;
use App\User;
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
            
            return redirect('view_foro/'.$foro_id);
  
    }

    public function getComent($id)
    {
        //$foro = Foro::where("area_id",$id)->where('foro.estadoFo','=',1)
        $all = Comentario::where ('for_id','=',$id)->get();
        $info = "";
        foreach($all as $contenido){
            $info = $info." "." <p class='color'>";
            $info = $info." ".$contenido->coment;                                       
                    $content1 = User::select('username')->where('id',$contenido->usua_id)->get();
                    foreach($content1 as $contenido1){
                        $info = $info."<br><i class='fas fa-user fa-2x'></i>";                                                
                        $info = $info." ".$contenido1->username."<br>";
                    }
            $info = $info." "."</p>";                                      
         } 
         return $info;
    }

   
}
