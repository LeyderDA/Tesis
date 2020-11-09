<?php

namespace App\Http\Controllers;
use App\ArchivosGestiones;
use App\Gestion;
use Illuminate\Http\Request;

class ArchivosGestionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_archivos($id)
    {
        $Gest= Gestion::findOrFail($id);
        return view('Archivos.Gestiones.create',compact('Gest'));

    }
    public function destroy($id)
    {
        $arch = ArchivosGestiones::find($id);
        $arch->delete();
        return  response()->json($arch);
    }



   
  
    public function store(Request $request)
    {

        $id = $request->input("id");
        foreach ($request->input('document', []) as $file) {
            ArchivosGestiones::insert(array('archivoGe' => "$file",'ges_id' => "$id"));
        } 
        return redirect('home');   
    }

    public function StoreMedia(Request $request){
     
        $path = storage_path('app/public/GestionArchivos');

        if (!file_exists($path)) {
          mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
        'name'          => $name,
        'original_name' => $file->getClientOriginalName(),
       ]);

    }

}
