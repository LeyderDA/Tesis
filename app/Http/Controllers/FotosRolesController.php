<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FotosRoles;
use App\User;

class FotosRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_archivos($id)
    {
        $Fotorol= User::findOrFail($id);
        return view('Archivos.FotoRol.create',compact('Fotorol'));

    }
    public function destroy($id)
    {
        $arch = FotosRoles::find($id);
        $arch->delete();
        return  response()->json($arch);
    }



   
  
    public function store(Request $request)
    {

        $id = $request->input("id");
        foreach ($request->input('document', []) as $file) {
            FotosRoles::insert(array('Fotorol' => "$file",'usu_rol_id' => "$id"));
        } 
        return redirect('home');   
    }

    public function StoreMedia(Request $request){
     
        $path = storage_path('app/public/FotosRoles');

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
