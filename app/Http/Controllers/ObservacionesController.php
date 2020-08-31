<?php

namespace App\Http\Controllers;
use App\Observaciones;
use Illuminate\Http\Request;

class ObservacionesController extends Controller
{
    public function store(Request $request)
    {
        $re = new Observaciones();
        $re->obsrv = $request->obsrv;
        $re->recp_id = $request->recp_id;
        $re->save();

        
        return  response()->json($re);
    }
}
