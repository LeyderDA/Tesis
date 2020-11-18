<?php

namespace App\Http\Controllers;
use App\Http\Controllers\request_id;
use Illuminate\Http\Request;
use App\Notificaciones;
use App\User;
class NotificacionesController extends Controller
{

    public function index()
    {
       


        $id = (new request_id)->get_id();  
        $areas = Notificaciones::all()->where('id_usuario','=',$id);
        return  response()->json($areas);

        // $mensj = Notificaciones::
        // select('notificaciones.*')
        // ->orderBy('notificaciones.id', 'asc')
        // ->where('notificaciones.id_usuario','=',$id)
        // ->get();
        
        //      if ($request->ajax()) {
        //       foreach ($mensj as $me) {
        //         $me->notificaciones;
        //      }
        //      return $mensj;
        //      } else {
        //       return  response()->json($mensj);
        //      }




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
