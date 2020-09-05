<?php

namespace App\Http\Controllers;
use App\Recepcion;
use App\Observaciones;
use App\UsuRecep;
use App\Gestion;
use Illuminate\Http\Request;

class QRCode extends Controller
{
    public function index(Request $request)
    {
        return view('qr.lector');
        //header('Location:../../../resources/views/qr/lector.html');
    }

    public function consultarRecepcion($dato)
    {
        $porciones = explode(";", $dato);
        $part1 = $porciones[0]; 
        $part2 = $porciones[1]; 

        if($part1 == 1){     
            $recepcion['recepcion'] = Gestion::join("recepciones","gestion_tramites.recp_id","=","recepciones.id")
            ->where("gestion_tramites.recp_id",$part2)
            ->get();
            return view('qr.qrview',$recepcion);

        }else if($part1 == 2){
            $recepcion['recepcion'] = Observaciones::join("recepciones","observaciones.recp_id","=","recepciones.id")
            ->where("observaciones.recp_id",$part2)
            ->get();
            return view('qr.qrview',$recepcion);
            
        }else if($part1 == 3){
            $recepcion['recepcion'] = Recepcion::join("usurecep","recepciones.id","=","usurecep.recp_id")
            ->join("users","usurecep.usu_id","=","users.id")
            ->where("users.id",$part2)
            ->get();    
            return view('qr.qrview',$recepcion);

        }
        
    }

}
