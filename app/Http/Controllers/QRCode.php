<?php

namespace App\Http\Controllers;
use App\Recepcion;
use Illuminate\Http\Request;

class QRCode extends Controller
{
    public function index(Request $request)
    {
        return view('qr.lector');
        //header('Location:../../../resources/views/qr/lector.html');
    }

    public function consultarRecepcion($id)
    {
        $recepcion['recepcion'] = Recepcion::all()->where('id',$id);
        return view('qr.qrview',$recepcion);
    }

}
