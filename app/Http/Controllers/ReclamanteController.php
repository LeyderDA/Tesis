<?php

namespace App\Http\Controllers;
use App\ArchivosReclamantes;
use App\Reclamante;
use App\Foro;
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

    public function destroy($id)
    {
        $rec = Reclamante::find($id);
        $rec->delete();
        return  response()->json($rec);
    }

    public function update(Request $request, $id)
    {
        $re = Reclamante::find($id);
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

    public function buscarreclaced($cedula)
    {
        $usuario = Reclamante::join("personas","reclamantes.per_id","=","personas.id")
        ->select('reclamantes.*',
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

    public function mostrarArchivos($id)
    { 

        $Recla = Reclamante::findOrFail($id);
        return view('ArchivosReclamante',compact('Recla'));
    
    }

}
