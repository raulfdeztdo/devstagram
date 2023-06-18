@extends('layouts.app')

@section('titulo')
    Regístrate en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="p-5 md:w-6/12">
            <img class="rounded-lg" src="{{ asset('img/registrar.jpg') }}" alt="Imagen registro usuarios">
        </div>
        <div class="p-6 bg-white rounded-lg shadow-xl md:w-4/12">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="block mb-2 font-bold text-gray-500 uppercase">
                        Nombre
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        placeholder="Tu nombre"
                        class="border p-3 w-full rounded-lg @error('name') border-red-400 bg-red-50 @enderror"
                        value="{{ old('name') }}"
                    />
                    @error('name')
                        <p class="p-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="block mb-2 font-bold text-gray-500 uppercase">
                        Username
                    </label>
                    <input
                        type="text"
                        name="username"
                        id="username"
                        placeholder="Tu nombre de usuario"
                        class="border p-3 w-full rounded-lg @error('username') border-red-400 bg-red-50 @enderror"
                        value="{{ old('username') }}"
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
                        placeholder="Email de registro"
                        class="border p-3 w-full rounded-lg @error('email') border-red-400 bg-red-50 @enderror"
                        value="{{ old('email') }}"
                    />
                    @error('email')
                        <p class="p-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 font-bold text-gray-500 uppercase">
                        Contraseña
                    </label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Contraseña de acceso"
                        class="border p-3 w-full rounded-lg @error('password') border-red-400 bg-red-50 @enderror"
                    />
                    @error('password')
                        <p class="p-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="block mb-2 font-bold text-gray-500 uppercase">
                        Repite contraseña
                    </label>
                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        placeholder="Repite contraseña de acceso"
                        class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-400 bg-red-50 @enderror"
                    />
                    @error('password_confirmation')
                        <p class="p-error">{{ $message }}</p>
                    @enderror
                </div>

                <input
                    type="submit"
                    name=""
                    id=""
                    class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-500 hover:bg-sky-700"
                    value="Crear cuenta"
                >

            </form>
        </div>
    </div>
@endsection