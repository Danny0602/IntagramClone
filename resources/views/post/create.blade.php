@extends('layouts.app')

@section('titulo')
    Crea una nueva Publicacion
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex mc:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{ route('imagenes.store') }}" method="Post" enctype="multipart/form-data" id="dropzone"
                class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 p-10  bg-white  rounded-lg shadow-xl mt-10 md:mt-0">

            <form action="{{ route('post.store') }}" method="POST">
                @csrf

                <div class="mb-5">
                    <label for="titulo" id="name" class="mb-2 block uppercase text-gray-500 font-bold">Titulo</label>
                    <input type="text" name="titulo" id="titulo" placeholder="Titulo de la publicacion"
                        class="@error('titulo') border-red-600 @enderror border p-3 w-full rounded-lg"
                        value="{{ old('titulo') }}">
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" id="name"
                        class="mb-2 block uppercase text-gray-500 font-bold">Descripcion</label>
                    <textarea name="descripcion" id="descripcion" placeholder="descripcion de la publicacion"
                        class="@error('descripcion') border-red-600 @enderror border p-3 w-full rounded-lg">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="hidden" name="imagen" value="{{ old('imagen') }}">
                </div>

                <input type="submit" value="Publicar"
                    class="text-white bg-sky-600 hover:bg-sky-700 transtion-colors cursor-pointer uppercase font-bold w-full p-3  rounded-lg">

            </form>
        </div>
    </div>
@endsection
