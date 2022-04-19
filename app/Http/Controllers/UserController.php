<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{

    public function __construct() //Limitar el acceso si no se esta identificado
    {
        $this->middleware('auth');
    }

    public function config(){

        return view('user.config');

    }

    public function update(Request $request){

        //Conseguir el usuario identificado

        $user = Auth::user();

        $id = $user->id;


        //Validación del formualario

        $validate = $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'nick' => 'required|string|max:255|unique:users,nick,'.$id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$id
        ]);

        //Recoger los datos del formulario

        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $nick = $request->input('nick');

        //Asignar nuevos valores al objeto del usuario

        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;

        //Subir la imagen

        $image_path = $request->file('image_path');
        
        if($image_path){
            //PONER NOMBRE ÚNICO
            $imagen_path_name = time().$image_path->getClientOriginalName();
            //GUARDAR EN LA CARPETA 'storage/app/users'
            Storage::disk('users')->put($imagen_path_name, File::get($image_path));
            $user->image = $imagen_path_name;
        }

        //Ejecutar los cambios en la base de datos

        $user->save();

        return redirect()->route('config')->with([
            'mensaje' => 'Usuario Actualizado correctamente'
        ]);

        

    }

    public function getImage($filename){
        var_dump($filename);
        $file = Storage::disk('users')->get($filename);

        return new Response($file, 200);
    }

}
