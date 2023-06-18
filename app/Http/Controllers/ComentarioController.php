<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function store(Request $request, Post $post)
    {
        // Validar
        $this->validate($request, [
            'comentario' => 'required|max:255'
        ]);

        // Almacenar el resultado
        Comentario::create([
            'user_id'       => auth()->user()->id,
            'post_id'       => $post->id,
            'comentario'    => $request->comentario,
        ]);

        // Imprimir un mensaje
        return back()->with('mensaje', 'Comentario realizado correctamente');
    }
}
