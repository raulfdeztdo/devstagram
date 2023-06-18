@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
            <livewire:like-post :post="$post"/>
            <div>
                <a href="/{{ $post->user->username }}">
                    <p class="font-bold">{{ $post->user->username }}</p>
                </a>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-5">{{ $post->descripcion }}</p>
            </div>
            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Eliminar publicación" class="p-2 mt-4 font-bold text-white bg-red-400 rounded cursor-pointer hover:bg-red-500">
                    </form>
                @endif
            @endauth
        </div>
        <div class="p-5 md:w-1/2">
            <div class="p-5 mb-5 bg-white shadow">
                @auth
                    <p class="mb-4 text-xl font-bold text-center">Agrega un nuevo comentario</p>

                    @if (session('mensaje'))
                        <div class="p-2 mb-6 font-bold text-white uppercase bg-green-400 rounded-lg">
                            {{ session('mensaje') }}
                        </div>
                    @endif

                    <form action="{{ route('comentarios.store', ['post' => $post]) }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="comentario" class="block mb-2 font-bold text-gray-500 uppercase">
                                Añade un comentario
                            </label>
                            <textarea
                                name="comentario"
                                id="comentario"
                                placeholder="Escribe aquí tu comentario"
                                class="border p-3 w-full rounded-lg @error('comentario') border-red-400 bg-red-50 @enderror"
                            ></textarea>
                            @error('comentario')
                                <p class="p-error">{{ $message }}</p>
                            @enderror
                        </div>
                        <input
                            type="submit"
                            name=""
                            id=""
                            class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-500 hover:bg-sky-700"
                            value="Enviar"
                        >
                    </form>
                @endauth

                <div class="mt-10 mb-5 overflow-y-scroll bg-white shadow max-h-96">
                    @if ($post->comentarios->count())
                        @foreach ( $post->comentarios as $comentario)
                            <div class="p-5 border-b border-gray-300">
                                <a class="font-bold" href="{{ route('posts.index', $comentario->user) }}">{{ $comentario->user->username }}</a>
                                <p>{{ $comentario->comentario }}</p>
                                <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center ">No hay comentarios</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection