<?php

namespace App\Http\Controllers;

use App\User;
use App\UsuRecep;
use Illuminate\Http\Request;

class AsigRecepController extends Controller
{
    public function index()
    {
        $usrec = UsuRecep::all();
        return  response()->json($usrec);
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

}
