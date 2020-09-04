<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class MiUsuarioController extends Controller
{
    public function index()
    {

        $id = (new request_id)->get_id();
        $date = User::all()->where('id',$id);
        return  response()->json($date);
    }
}
