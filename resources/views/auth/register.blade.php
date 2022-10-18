@extends('layouts.app')

@section('titulo')
    Registrate en Insta
@endsection


@section('contenido')
    <div class="md:flex md:justify-center md:gap-5 md:items-center">
        <div class="md:w-6/12  p-5">

            <img src="{{ asset('img/Diseño/registrar.jpg') }}" alt="imagen de registro para usuarios">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl ">
            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="mb-5">
                    <label id="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input type="text" name="name" id="name" placeholder="Tu Nombre" class="@error('name') border-red-600 @enderror border p-3 w-full rounded-lg" value="{{ old('name') }}">
                @error('name')

                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
                </div>

                <div class="mb-5">
                    <label id="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input type="text" name="username" id="username" placeholder="Tu Usuario"  class="@error('username') border-red-600 @enderror border p-3 w-full rounded-lg" value="{{ old('username') }}">
                    @error('username')

                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label id="email" class="mb-2 block uppercase text-gray-500 font-bold">E-mail</label>
                    <input type="text" name="email" id="email" placeholder="Tu E-mail"  class="@error('email') border-red-600 @enderror border p-3 w-full rounded-lg" value="{{ old('email') }}">
                    @error('email')

                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label id="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password"  class="@error('password') border-red-600 @enderror border p-3 w-full rounded-lg" >
                    @error('password')

                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label id="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Password Confirm</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Password Confirm" class="border p-3 w-full rounded-lg">
                    @error('password_confirmation')

                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <input type="submit" value="Crear Cuenta" class="text-white bg-sky-600 hover:bg-sky-700 transtion-colors cursor-pointer uppercase font-bold w-full p-3  rounded-lg"> 
            </form>

        </div>

    </div>
@endsection
