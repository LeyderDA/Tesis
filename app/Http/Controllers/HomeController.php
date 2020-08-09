<?php

namespace App\Http\Controllers;

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
        if ((auth()->User()->rol_id) == 1) {
            return view('home');
        } elseif ((auth()->User()->rol_id) == 2) {
            return view('administrativo');
        } elseif ((auth()->User()->rol_id) == 3) {
            return view('docente');
        } else {
            return view('estudiante');
        }
    }
}
