<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Función que devuelve la vista de registrar un usuario
     *
     * @return view, vista en la que se registra un usuario
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Función para registrar un usuario
     *
     * @param Request $request
     * @return redirect
     */
    public function store(Request $request)
    {
        // Modificamos request de username para validarlo formateado
        $request->request->add([
            Str::slug($request->username)
        ]);

        // Validación
        $this->validate($request, [
            'name'                      => 'required|max:30',
            'username'                  => 'required|unique:users|min:3|max:20',
            'email'                     => 'required|unique:users|email|max:60',
            'password'                  => 'required|confirmed|min:6',
        ]);

        // Creación usuario
        User::create([
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            'password'      => Hash::make($request->password) ,
        ]);

        // Autenticar (Login) de un usuario
        /*\auth()->attempt([
            'email'     => $request->email,
            'password'  => $request->password
        ]);*/

        \auth()->attempt($request->only('email', 'password'));

        // Redirección
        return \redirect()->route('posts.index', \auth()->user()->username);
    }
}
