<?php

namespace App\Http\Controllers;
use App\ArchivosForos;
use App\Foro;
use Illuminate\Http\Request;

class ArchivosForosController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_archivos($id)
    {
        $Fo= Foro::findOrFail($id);
        return view('Archivos.Foros.create',compact('Fo'));

    }
    public function destroy($id)
    {
        $arch = ArchivosForos::find($id);
        $arch->delete();
        return  response()->json($arch);
    }

    public function store(Request $request)
    {

        $id = $request->input("id");
 
        foreach ($request->input('document', []) as $file) {
            ArchivosForos::insert(array('archivoFo' => "$file",'foro_id' => "$id","created_at" => date('Y-m-d H:i:s')));
        } 
        return redirect('home');   
    }

    public function storeMedia(Request $request){
     
        $path = storage_path('app/public/ForoArchivos');

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
