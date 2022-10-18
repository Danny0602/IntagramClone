<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){

        //RE ESCRIBIR EL REQUEST PARA VERIFICAR SI YA EXISTE
        $request-> request->add(['username' => Str::slug($request->username)]);


        //VALIDACION
        $this->validate($request,[
            'name' => 'required|min:3|max:15',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|max:60',
            'password' => "required|confirmed|min:6"
            
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //AUTENTICAR USUARIOS
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        //REDIRECCIONAR
        return redirect()->route('post.index',auth()->user()->username);

    }
}
