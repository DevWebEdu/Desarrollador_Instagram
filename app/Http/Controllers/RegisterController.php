<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('auth.register');
    }

    public function store(Request $request) 
    {

    /* MODIFICAMOS EL REQUEST */
    $request->request->add(['username' => Str::slug($request->username)]);

    /* VALIDAMOS LOS CAMPOS DEL FORMULARIO DE REGISTRO */
       $result = $this->validate($request,[
        'name' => 'required|max:30',
        'username' => 'required|unique:users|min:3|max:30',
        'email' => 'required|unique:users|email|max:60',
        'password' => 'required|confirmed|min:6',
       ] );


       /* CREANDO EL USUARIO */
       
       User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'imagen' => null
       ]);
       /* AUTENTICAR USUARIO */

       auth()->attempt([
        'email' => $request-> email,
        'password' => $request->password
       ]);

       /* REDIRECCIONAR  */
       return redirect()->route('posts.index', ['user' => auth()->user()->username]);
    }
    

}
