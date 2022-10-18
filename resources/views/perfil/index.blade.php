@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form method="POST" action="{{ route('perfil.store',auth()->user()->username) }}" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label id="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input type="text" name="username" id="username"
                        class="@error('username') border-red-600 @enderror border p-3 w-full rounded-lg"
                        value="{{ auth()->user()->username }}">

                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label id="email" class="mb-2 block uppercase text-gray-500 font-bold">E-mail</label>
                    <input type="text" name="email" id="email"
                        class="@error('email') border-red-600 @enderror border p-3 w-full rounded-lg"
                        value="{{ auth()->user()->email }}">

                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label id="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Imagen Perfil</label>
                    <input type="file" name="imagen" id="imagen" class=" border p-3 w-full rounded-lg" >


                </div>
                <div class="mb-5  ">
                    <label id="" class="mb-2 block uppercase text-gray-500 font-bold">Imagen Actual</label>

                    <img class="mx-auto rounded-full w-44" src="{{auth()->user()->imagen ? asset('perfiles'). '/' .auth()->user()->imagen : asset('img/usuario.svg') }}" alt="imagen usuario">
                </div>

                <input type="submit" value="Guardar Cambios"
                    class="text-white bg-sky-600 hover:bg-sky-700 transtion-colors cursor-pointer uppercase font-bold w-full p-3  rounded-lg">


            </form>
        </div>
    </div>
@endsection
