<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $posts = Post::simplePaginate(8);

        return view('dashboard.index', [
            'posts' => $posts
        ]);
    }
}
