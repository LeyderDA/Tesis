<?php

namespace App\Http\Controllers;
use App\Recepcion;
use Illuminate\Http\Request;

class QRCode extends Controller
{
    public function index(Request $request)
    {
        return view('qr.lector');
    }

    public function consultarRecepcion($id)
    {
        $recepcion['recepcion'] = Recepcion::all()->where('id',$id)->get();
        return view('qr.qrview',$recepcion);
    }

}
