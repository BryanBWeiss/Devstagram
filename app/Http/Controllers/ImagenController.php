<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    //
    public function store(Request $request){
       // $input = $request->all();
       $image = $request->file('file');
       $nombreImagen = Str::uuid(). "." . $image->extension();
       $imagenServidor = Image::make($image);
       $imagenServidor->fit(1000,1000);

       $imagePach = public_path('uploads').'/'. $nombreImagen;
       $imagenServidor->save($imagePach);
       return response()->json($nombreImagen);
    }
}
