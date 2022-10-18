@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex  ">
        <div class="md:w-1/2 p-5">
            <img class="" src="{{ asset('uploads') . '/' . $post->imagen }}" alt="imagen del post">
            <div class="mt-2 flex items-center ">
                @auth

                    <livewire:like-post :post="$post" />



                @endauth

            </div>
            <div class="">
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-600">{{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-5">{{ $post->descripcion }}</p>
            </div>
            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form method="post" action="{{ route('post.destroy', $post) }}">
                        @method('delete')
                        @csrf
                        <input type="submit" value="Eliminar Publicacion"
                            class="bg-red-500 hover:bg-red-600 p-2 rounded mt-4 text-white uppercase">
                    </form>
                @endif
            @endauth

        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5 ">
                @auth

                    <p class="font-bold text-xl mb-4 text-center">Agrega un nuevo comentario</p>
                    <livewire:comentarios :post="$post"/>
                    {{-- @if (session('mensaje'))
                        <div class="bg-green-500 p-2 rounded-lgmb-6 text-white text-center uppercase font-bold">
                            {{ session('mensaje') }}
                        </div>
                    @endif

                    <form action="{{ route('comentarios.store', [$user, $post]) }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="comentario" id="name"
                                class="mb-2 block uppercase text-gray-500 font-bold">Comentario</label>
                            <textarea name="comentario" id="comentario" placeholder="Agrega un comentario"
                                class="@error('comentario') border-red-600 @enderror border p-3 w-full rounded-lg"></textarea>
                            @error('comentario')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                            @enderror
                        </div>



                        <input type="submit" value="Publicar"
                            class="text-white bg-sky-600 hover:bg-sky-700 transtion-colors cursor-pointer uppercase font-bold w-full p-3  rounded-lg"> --}}

                    {{-- </form> --}}
                @endauth
                {{-- <div class="bg-white shados mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{ route('post.index', $comentario->user) }}"
                                    class="font-bold">{{ $comentario->user->username }}</a>
                                <p>{{ $comentario->comentario }}</p>
                                <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>


                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">No Hay Comentarios Aun</p>
                    @endif

                </div> --}}
            </div>
        </div>

    </div>
@endsection
