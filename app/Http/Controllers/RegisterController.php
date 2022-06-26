<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;

class RegisterController extends Controller
{



    public function index() {
        return view('auth.register');
    }

    public function store(Request $request){
      //  return dd($Request);
      //rescribir nombre sin espacios 
  $request->request->add(['username' => Str::slug($request->username)]);

$this->validate($request ,[
    'name' => 'required|max:30',
    'username' => 'required|unique:users|min:5|max:30',
    'email' => 'required|unique:users|email|max:60',
    'password' => 'required|confirmed|min:6'        ],

    [ 'required'  => 'Este campo es obligatorio',
      'unique'  => 'El nombre i/o email ya esta registrado' ]);

      
      User::create([
         'name' => $request->name,
         'username' => $request->username,
         'email' => $request->email,
         'password' => Hash::make($request->password)
       
        ]);

        // auth()->attempt([
        //    'email' => $request->email,
        //    'password' => $request->password
        // ]);
       // dd($request);
       // otra forma de iniciar sesion
      auth()->attempt($request->only('email','password'));

      return redirect(Auth::user()->username);
    }
}


// $User = new User;
 
// $User->name = $request->name;
// $User->username = $request->username;
// $User->email = $request->email;
// $User->password = $request->password;
// $User->save();

// $this->validate($request ,[
//     'name' => 'required|max:30',
//     'username' => 'required|unique:users|min:5|max:30',
//     'email' => 'required|unique:users|email|max:60',
//     'password' => 'required|confirmed|min:6'        ],

//     [ 'required'  => 'Este campo es obligatorio',
//       'unique'  => 'El campo Usuario es Obligatorio' ]);

      
//       User::created([
//          'name' => $request->name,
//          'email' => $request->email,
//          'password' => $request->password,
//          'username' => $request->username
//         ]);

//        // dd($request);