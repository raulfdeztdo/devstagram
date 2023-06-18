@extends('layouts.app')

@section('titulo')
    Perfil: {{ $user->username }}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="flex flex-col items-center w-full md:w-8/12 lg:w-6/12 md:flex-row">
            <div class="w-8/12 px-5 lg:w-6/12">
                <img src="{{ $user->imagen ? asset('perfiles') . "/" . $user->imagen : asset('img/usuario.svg') }}" alt="Imagen usuario">
            </div>
            <div class="flex flex-col items-center px-5 py-10 md:w-8/12 lg:w-6/12 md:justify-center md:items-start">
                <div class="flex items-center gap-2">
                    <p class="text-2xl text-gray-700">{{ $user->username }}</p>
                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a class="text-gray-500 cursor-pointer hover:text-gray-600" href="{{ route('perfil.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                    <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>
                <p class="mt-5 mb-3 text-sm font-bold text-gray-800">
                    {{ $user->followers()->count() }}
                    <span class="font-normal"> @choice('Seguidor|Seguidores', $user->followers()->count())</span>
                </p>
                <p class="mb-3 text-sm font-bold text-gray-800">
                    {{ $user->followings()->count() }}
                    <span class="font-normal"> Siguiendo</span>
                </p>
                <p class="mb-3 text-sm font-bold text-gray-800">
                    {{ $user->posts()->count() }}
                    <span class="font-normal"> Posts</span>
                </p>
                @auth
                    @if ($user->id !== auth()->user()->id)
                        @if (!$user->following(auth()->user()))
                            <form action="{{ route('users.follow', ['user' => $user]) }}" method="POST">
                                @csrf
                                <input type="submit" class="px-3 py-1 text-xs font-bold text-white uppercase bg-blue-400 rounded-lg cursor-pointer" value="seguir">
                            </form>
                        @else
                            <form action="{{ route('users.unfollow', ['user' => $user]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="px-3 py-1 text-xs font-bold text-white uppercase bg-red-400 rounded-lg cursor-pointer" value="dejar de seguir">
                            </form>
                        @endif
                    @endif
                @endauth
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="my-10 text-4xl font-black text-center">Publicaciones</h2>

        @if ($posts->count() > 0)
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($posts as $post)
                    <div>
                        <a href="{{ route('posts.show', ['user' => $post->user, 'post' => $post]) }}">
                            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Titulo de la imagen {{ $post->titulo }}">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="my-10">
                {{ $posts->links('pagination::tailwind') }}
            </div>
        @else
            <p class="text-sm font-bold text-center text-gray-600 uppercase">No hay posts</p>
        @endif



    </section>
@endsection