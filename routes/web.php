<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/aaa', function () {

    /*
    $images = Image::all();

    foreach($images as $image){
        
        echo "Imagen de: ".$image->description."<br>";
        
        echo "Subida por: ".($image->user->name)."<br>";
        
        echo 'Likes: '.count($image->likes);
        echo "<br>";

        echo "Comentarios: ";
        echo "<br>";

        if(count($image->comments) >= 1){
            foreach($image->comments as $comment){
                echo "Comentario: ".$comment->content."<br>";
                echo "Hecho por: ".$comment->user->name."<br>";
                echo "<br>";
            }
        }

    }
    die();
    */

    return view('welcome');
});

Auth::routes(
    
);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/configuracion', [App\Http\Controllers\UserController::class, 'config'])->name('config');

Route::post('/user/edit',[App\Http\Controllers\UserController::class, 'update'])->name('user.update');

Route::get('user/avatar/{filename}', [App\Http\Controllers\UserController::class, 'getImage'])->name('user.avatar');

Route::get('/subir-imagen', [App\Http\Controllers\ImageController::class, 'create'])->name('image.create');

Route::post('/image/save',[App\Http\Controllers\ImageController::class, 'save'])->name('image.save');
