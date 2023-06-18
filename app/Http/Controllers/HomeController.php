<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        // Obtener a quienes seguimos y los posts
        $ids = auth()->user()->followings->pluck('id')->toArray();
        $posts = Post::WhereIn("user_id", $ids)->latest()->paginate(20);

        return view('home', [
            'posts' => $posts
        ]);
    }
}
