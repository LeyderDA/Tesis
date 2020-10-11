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
        $usua->rol_id=$request->rol_id;
        $usua->save();
        $usua->persona;
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
        $usua=User::find($id);
        $usua->username=$request->username;
        $usua->email=$request->email;
        $usua->rol_id=$request->rol_id;
        $usua->save();
        $usua->persona;
        return  response()->json($usua);
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

    public function buscar($id)
    {   
        $pers = User::where("id",$id)->get();
        
            return  $pers;
        
    }


    public function buscarusuced($cedula)
    {
        $usuario = User::join("personas","users.per_id","=","personas.id")
        ->select('users.*',
        'personas.cedula',
        'personas.prinom',
        'personas.segnom',
        'personas.priape',
        'personas.segape'
        )
        ->where("personas.cedula","=",$cedula)
        ->get(); 
        return  $usuario;   
    }

    public function buscarusucedPRO($cedula)
    {       
        $usuario = User::join("personas","users.per_id","=","personas.id")
        ->select('users.*',
        'personas.cedula',
        'personas.prinom',
        'personas.segnom',
        'personas.priape',
        'personas.segape'
        )
        ->where("personas.cedula","=",$cedula)
        ->where("users.rol_id","=",4)
        ->get(); 
        return  $usuario;   
    }

    public function buscarusucedADM($cedula)
    {
        $id = (new request_id)->get_id();
        $usuario = User::join("personas","users.per_id","=","personas.id")
        ->select('users.*',
        'personas.cedula',
        'personas.prinom',
        'personas.segnom',
        'personas.priape',
        'personas.segape'
        )
        ->where("personas.cedula","=",$cedula)
        ->where("users.id","=",$id)
        ->get(); 
        return  $usuario;   
    }
    public function aggestudiante($cedula)
    {
        $usuario = User::join("personas","users.per_id","=","personas.id")
        ->select('users.*',
        'personas.cedula',
        'personas.prinom',
        'personas.segnom',
        'personas.priape',
        'personas.segape'
        )
        ->where("personas.cedula","=",$cedula)
        ->where("users.rol_id","=",3)
        ->get(); 
        return  $usuario;   
    }

    public function aggestudianteRe($cedula)
    {
        $usuarioo = User::join("personas","users.per_id","=","personas.id")
        ->select('users.*',
        'personas.cedula',
        'personas.prinom',
        'personas.segnom',
        'personas.priape',
        'personas.segape'
        )
        ->where("personas.cedula","=",$cedula)
        ->where("users.rol_id","=",3)
        ->get(); 
        return  $usuarioo;   
    }


    
}
