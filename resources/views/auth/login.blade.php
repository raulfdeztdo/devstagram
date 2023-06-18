@extends('layouts.app')

@section('titulo')
    Inicia sesión en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="p-5 md:w-6/12">
            <img class="rounded-lg" src="{{ asset('img/login.jpg') }}" alt="Imagen login usuarios">
        </div>
        <div class="p-6 bg-white rounded-lg shadow-xl md:w-4/12">
            <form method="POST" action="{{ route('login' ) }}" novalidate>
                @csrf
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
                @if (session('mensaje'))
                    <p class="p-error">{{ session('mensaje') }}</p>
                @endif
                <div class="mb-5">
                    <input type="checkbox" name="remember">
                    <label class="text-sm text-gray-700">
                        Mantener sesión abierta
                    </label>
                </div>
                <input
                    type="submit"
                    name=""
                    id=""
                    class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-500 hover:bg-sky-700"
                    value="Iniciar sesión"
                >
            </form>
        </div>
    </div>
@endsection