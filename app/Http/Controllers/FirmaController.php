<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirmaController extends Controller
{
    public function index(Request $request)
    {   

        return view('CrearFirma');
    }
}
