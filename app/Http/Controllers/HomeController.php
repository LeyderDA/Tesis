<?php

namespace App\Http\Controllers;

use App\UsuRecep;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $datos['Asignacion']=UsuRecep::paginate(100)->where('usu_id',auth()->id());
            return view('home',$datos);

    }
}
