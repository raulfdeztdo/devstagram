<div>
    @if ($posts->count())
        @foreach ($posts as $post)
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                <div>
                    <a href="{{ route('posts.show', ['user' => $post->user, 'post' => $post]) }}">
                        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Titulo de la imagen {{ $post->titulo }}">
                    </a>
                </div>
            </div>

            <div class="my-10">
                {{ $posts->links('pagination::tailwind') }}
            </div>
        @endforeach
    @else
        No hay posts, sigue a algun amigo para ver sus posts
    @endif
</div>