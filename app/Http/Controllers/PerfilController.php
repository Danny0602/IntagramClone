<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        if ($user->username === auth()->user()->username) {
            return view('perfil.index');
        }else{
            return redirect()->route('perfil.index',auth()->user());
        }
    }

    public function store(Request $request)
    {

        //RE ESCRIBIR EL REQUEST PARA VERIFICAR SI YA EXISTE
        $request-> request->add(['username' => Str::slug($request->username)]);

        $this->validate($request,[
            'username' => ['required','unique:users,username,'.auth()->user()->id, 'min:3','max:20','not_in:twitter,editar-perfil']
        ]);
        

        if($request->files){
            $imagen = $request->file('imagen');
 
            $nombreImagen = Str::uuid().'.'.$imagen->extension();
            
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1080, 1080);
 
            $imagenPath = public_path('perfiles').'/'.$nombreImagen;
 
            $imagenServidor->save($imagenPath);
            
        }
        $usuario = User::find(auth()->user()->id);
 
        $usuario->username = $request->username;
        
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->save();


        // Redireccionar
        return redirect()->route('post.index', $usuario->username);

         

    }

}
