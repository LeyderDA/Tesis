<?php

namespace App\Http\Controllers;
use App\ArchivosReclamantes;
use Illuminate\Http\Request;

class ArchivosReclamantesController extends Controller
{
    public function store(Request $request)
    {
        $ges = new ArchivosReclamantes();
        $ges->recla_id = $request->recla_id;
        $ges->archivoRe="storage/archivosReclamantes/".$request->archivoRe;  
        $ges->save();
        return  response()->json($ges);
    }

    public function storeARCH(Request $request)
    {
        $image=$request->file('file');
        $name=$image->getClientOriginalName();
        $image->move(storage_path('app/public/archivosReclamantes'), $name);
      
    }
}
