@extends('layouts.app')

@section('titulo')
    Perfil: {{ $user->username }}
@endsection
@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="px-5 w-8/12 lg:w-6/12 rounded-full">
                <img class="rounded-full"
                    src="{{ $user->imagen ? asset('perfiles') . '/' . $user->imagen : asset('img/usuario.svg') }}"
                    alt="imagen usuario">
            </div>

            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">

                <div class="flex items-center gap-2">
                    <p class="text-gray-600 text-3xl ">{{ $user->username }}</p>
                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a class="tex-gray-500 hover:text-gray-600 cursor-pointer"
                                href="{{ route('perfil.index', $user) }}"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>
                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">{{ $user->followers->count() }} <span class="font-normal">@choice('Seguidor|Seguidores',$user->followers->count())</span></p>
                <p class="text-gray-800 text-sm mb-3 font-bold">{{ $user->followings->count() }} <span class="font-normal">Siguiendo</span></p>
                <p class="text-gray-800 text-sm mb-3 font-bold">{{ $user->post->count() }} <span
                        class="font-normal">Publicaciones</span></p>
                @auth
                    @if ($user->id !== auth()->user()->id)
                        @if (!$user->siguiendo(auth()->user()))
                            <form action="{{ route('user.follow', $user) }}" method="post">
                                @csrf
                                <input value="Seguir" type="submit"
                                    class="bg-blue-600 uppercase text-white text-sm cursor-pointer px-3 py-1 rounded">
                            </form>
                        @else
                            <form action="{{ route('user.unfollow', $user) }}" method="post">
                                @csrf
                                @method('delete')
                                <input value="Dejar de Seguir" type="submit"
                                    class="bg-red-600 uppercase text-white text-sm cursor-pointer px-3 py-1 rounded">
                            </form>
                        @endif
                    @endif
                @endauth
            </div>

        </div>

    </div>
    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
        <x-listar-posts  :posts="$posts" />
    </section>
@endsection
