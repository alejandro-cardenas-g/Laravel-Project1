<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{


    public function __construct() //Limitar el acceso si no se esta identificado
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('image.create');
    }

    public function save(Request $request){

        //Validación

        $validate = $this->validate($request,[
            'description' => 'required',
            'image_path'  => 'required|image'  
        ]);

        $descripcion = $request->input('description');
        $image_path = $request->file('image_path');
        
        //Asignar valores al objeto
        $user = Auth::user();
        $image = new Image();
        $image->user_id = $user->id;

        $image->description = $descripcion;

        //Subir fichero
        if($image_path){
            $image_path_name= time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $image->img_path = $image_path_name;
        }

        $image->save();

        return redirect()->route('home')->with([
            'mensaje' => 'La imagen se ha publicado correctamente'
        ]);

    }

}
