<?php

namespace App\Http\Controllers;
use App\ArchivosReclamantes;
use App\Reclamante;
use Illuminate\Http\Request;

class ArchivosReclamantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_archivos($id)
    {
        $Recl= Reclamante::findOrFail($id);
        return view('Archivos.Reclamantes.create',compact('Recl'));

    }
    public function destroy($id)
    {
        $arch = ArchivosReclamantes::find($id);
        $arch->delete();
        return  response()->json($arch);
    }

    public function store(Request $request)
    {

        $id = $request->input("id");
        foreach ($request->input('document', []) as $file) {
            ArchivosReclamantes::insert(array('archivoRe' => "$file",'recla_id' => "$id"));
        } 
        return redirect('home');   
    }

    public function StoreMedia(Request $request){
     
        $path = storage_path('app/public/ReclamanteArchivos');

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
