<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    //Form to create a Post
    public function index()
    {
        return view('posts.create');
    }

    //Save the post on the database
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
            'description' => ['required', 'max:255'],
            'image' => ['required', 'file']
        ]);

        $imagen = $request->file('image');

        $nombre_imagen = Str::uuid() . "." . $imagen->extension();

        $imagen_servidor = Image::make($imagen);
        $imagen_servidor->fit(1000, 1000);

        $imagen_path = public_path('uploads') . '/' . $nombre_imagen;
        if (!file_exists($imagen_path)) {
            mkdir($imagen_path, 666, true);
        }
        $imagen_servidor->save($imagen_path);

        $url = Str::uuid();
        $request->request->add(['url' => Str::slug($url)]);

        Post::create([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'image' => $nombre_imagen,
            'url' => $request->url,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('perfil', auth()->user()->username);
    }

    //View the post
    public function show(User $user, Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    //Delete the Post
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        //Eliminar la imagen
        $imagen_path = public_path('uploads/' . $post->image);

        if (File::exists($imagen_path)) {
            unlink($imagen_path);
        }

        return redirect()->route('perfil', auth()->user()->username);
    }
}
