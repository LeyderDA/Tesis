<?php

namespace App\Http\Controllers;
use App\FotosEstudiantes;
use App\User;
use Illuminate\Http\Request;

class FotosEstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_archivos($id)
    {
        $Foto= User::findOrFail($id);
        return view('Archivos.Fotos.create',compact('Foto'));

    }
    public function destroy($id)
    {
        $arch = FotosEstudiantes::find($id);
        $arch->delete();
        return  response()->json($arch);
    }



   
  
    public function store(Request $request)
    {

        $id = $request->input("id");
        foreach ($request->input('document', []) as $file) {
            FotosEstudiantes::insert(array('Foto' => "$file",'est_id' => "$id"));
        } 
        return redirect('home');   
    }

    public function StoreMedia(Request $request){
     
        $path = storage_path('app/public/FotosEstudiantes');

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

