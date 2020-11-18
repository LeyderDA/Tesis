<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notificaciones;
class NotificacionesController extends Controller
{

    public function index()
    {
        $areas = Notificaciones::all();
        return  response()->json($areas);
    }
    public function destroy($id)
    {
        $not = Notificaciones::find($id);
        $not->delete();
        return  response()->json($not);
    }

    public function store(Request $request)
    {
        $not = new Notificaciones();
        $not->mensaje = $request->mensaje;
        $not->id_usuario = $request->id_usuario;

        $not->save();

        return  response()->json($not);
    }
}
