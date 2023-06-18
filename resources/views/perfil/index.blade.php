@extends('layouts.app')

@section('titulo')
    Editar perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="p-6 bg-white shadow md:w-1/2">
            <form method="POST" action="{{ route('perfil.store') }}" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label for="username" class="block mb-2 font-bold text-gray-500 uppercase">
                        Username
                    </label>
                    <input
                        type="text"
                        name="username"
                        id="username"
                        placeholder="Tu nombre"
                        class="border p-3 w-full rounded-lg @error('username') border-red-400 bg-red-50 @enderror"
                        value="{{ auth()->user()->username  }}"
                    />
                    @error('username')
                        <p class="p-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="block mb-2 font-bold text-gray-500 uppercase">
                        Email
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        placeholder="Tu Email"
                        class="border p-3 w-full rounded-lg @error('email') border-red-400 bg-red-50 @enderror"
                        value="{{ auth()->user()->email }}"
                    />
                    @error('email')
                        <p class="p-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="imagen" class="block mb-2 font-bold text-gray-500 uppercase">
                        Imagen perfil
                    </label>
                    <input
                        type="file"
                        name="imagen"
                        id="imagen "
                        class="w-full p-3 border rounded-lg"
                        accept=".jpg, .jpeg, .png, .gif"
                        value=""
                    />
                </div>
                <input
                    type="submit"
                    name=""
                    id=""
                    class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-500 hover:bg-sky-700"
                    value="Guardar cambios"
                >
            </form>
        </div>
    </div>
@endsection