<?php

namespace App\Http\Controllers;

use App\User;
use App\UsuRecep;
use Illuminate\Http\Request;

class AsigRecepController extends Controller
{
    public function index(Request $request)
    {
        $usurecep = UsuRecep::join("recepciones","usurecep.recp_id","=","recepciones.id")
        ->join("users","usurecep.usu_id","=","users.id")
        ->join("personas","users.per_id","=","personas.id")
        ->join("areas","recepciones.area_id","=","areas.id")
        ->select('usurecep.*'
        ,'users.username'

        ,'recepciones.recepcionado'
        ,'recepciones.fecharadicado'
        ,'recepciones.fecharecepcionado'
        ,'recepciones.consultorio'
        ,'recepciones.fechareparto'
        ,'recepciones.fechapublicacion'
        ,'recepciones.fecharetiro'
        ,'recepciones.estado'
        ,'areas.nombre'
        ,'personas.cedula'
        ,'personas.prinom'
        ,'personas.segnom'
        ,'personas.priape'
        ,'personas.segape'
        ,'personas.tel'
        ,'personas.direc'
        )
        ->orderBy('usurecep.recp_id', 'asc')
        ->get();

         if ($request->ajax()) {
                          foreach ($usurecep as $rec) {
                            $rec->usurecep;
                            $rec->persona;   
                            $rec->reclamante;
                            $rec->area;                          
                          }
                          return $usurecep;
                      } else {
                          return  response()->json($usurecep);
                      }   
    }

    public function store(Request $request)
    {
        $usrec=new UsuRecep();
        $usrec->recp_id=$request->recp_id;
        $usrec->usu_id=$request->usu_id;
        $usrec->save();
        return  response()->json($usrec);
    }

    public function update(Request $request, $id)
    {
        $usrec=UsuRecep::find($id);
        $usrec->recp_id=$request->recp_id;
        $usrec->usu_id=$request->usu_id;
        $usrec->save();
        return  response()->json($usrec);
    }

    public function destroy($id)
    {
        $usrec = UsuRecep::find($id);
        $usrec->delete();
        return  response()->json($usrec);
      
    }

    public function buscar($id)
    {   
        $user = User::where("id",$id)->get();
        
            return  $user;
        
    }


    public function mostrar($id)
    {   
        $user = User::where("id",$id)->get();
        
            return  $user;
        
    }


}
