<div>
    @if ($message)
    <div class="bg-green-500 p-2 rounded-lgmb-6 text-white text-center uppercase font-bold">
        {{ $message }}
    </div>
        
    @endif
        
    

    <form>
        <div class="mb-5">
            <label for="comentario" id="name" class="mb-2 block uppercase text-gray-500 font-bold">Comentario</label>
            <textarea wire:model="comentario" id="comentario" placeholder="Agrega un comentario"
                class="@error('comentario') border-red-600 @enderror border p-3 w-full rounded-lg"></textarea>
            @error('comentario')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
            @enderror
        </div>



        <input wire:click="comentario" value="Publicar"
            class="text-white text-center bg-sky-600 hover:bg-sky-700 transtion-colors cursor-pointer uppercase font-bold w-full p-3  rounded-lg">
    </form>

    <div class="bg-white shados mb-5 max-h-96 overflow-y-scroll mt-10">
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

    </div>
</div>
