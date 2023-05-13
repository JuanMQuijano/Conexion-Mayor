<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PaginasController extends Controller
{
    //Renderiza las publicaciones que tengan el tipo oferta
    public function ofertas()
    {
        $posts = Post::where('type', 'oferta')->simplePaginate(8);

        return view('pages.ofertas', [
            'posts' => $posts
        ]);
    }

    //Renderiza las publicaciones que tengan el tipo demanda
    public function demandas()
    {
        $posts = Post::where('type', 'demanda')->simplePaginate(8);

        return view('pages.demandas', [
            'posts' => $posts
        ]);
    }
}
