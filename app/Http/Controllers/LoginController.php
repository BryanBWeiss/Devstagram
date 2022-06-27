<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;

class LoginController extends Controller
{
    //
    public function index(){
        
        return view('auth.login');
    }

    public function store(Request $Request){
  
         $this->validate($Request, [

            'email' => 'required|email',
            'password' => 'required'      
         ]);

         if(!auth()->attempt($Request->only('email','password'), $Request->remenber)){
           
            return back()->with('mensaje', 'Credenciales Incorrectas');

         }
         
         return redirect()->route('posts.index', auth()->user()->username); 
         //return redirect(Auth::user()->username);
         

    }
}
