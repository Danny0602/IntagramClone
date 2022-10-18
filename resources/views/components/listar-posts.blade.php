<div>
    @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 ">
            @foreach ($posts as $post)
                <div>
                    <a href="{{ route('post.show', [$post->user, $post]) }}"><img
                            src="{{ asset('uploads') . '/' . $post->imagen }}" alt="imagen del post {{ $post->titulo }}">
                    </a>

                </div>
            @endforeach
        </div>

        <div class="my-10">
            {{ $posts->links() }}
        </div>
    @else
        
            <p class="text-center text-gray-500 text-4xl font-bold align-middle">No hay posts, Sigue a alguien para poder ver
                los posts recientes</p>
        
    @endif
</div>