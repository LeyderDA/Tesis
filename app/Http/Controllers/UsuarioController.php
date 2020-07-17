<?php

namespace App\Http\Controllers;

use App\User;
use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {  
        $usuarios = User::all();
        if($request->ajax()){
            foreach ($usuarios as $usua){
                $usua->persona;
            }
            return $usuarios;
        }else{
            return  response()->json($usuarios);
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
        $usua=new User();
        $usua->username=$request->username;
        $usua->email=$request->email;
        $usua->password=Hash::make($request->password);
        $usua->per_id=$request->per_id;
        $usua->save();
        return  response()->json($usua);

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
        $pers = User::find($id);
        $pers->delete();
        return  response()->json($pers);
      
    }


    
}
