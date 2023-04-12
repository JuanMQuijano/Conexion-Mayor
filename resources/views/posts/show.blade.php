@extends('layout')

@section('pagina')
    {{ $post->name }}
@endsection

@section('contenido')
    <div class="container mx-auto mt-10 flex items-center">
        <div class="w-2/4 flex flex-col items-center justify-center">
            <img src="/uploads/{{ $post->image }}" alt="Imagen Publicacíon {{ $post->name }}" class="w-2/3 mx-auto">

            <div class="flex justify-around w-full">
                <a href="{{ route('perfil', $post->post_owner->username) }}"
                    class="font-bold">{{ $post->post_owner->username }}</a>
                <p>💝 0</p>
            </div>

            <div class="flex justify-around w-full mt-8">
                <p>{{ $post->description }}</p>
                <p class="font-bold">{{ $post->created_at->diffForHumans() }}</p>
            </div>

            @auth
                @if (auth()->user()->id === $post->post_owner->id)
                    <form action="{{ route('posts/destroy', $post) }}" class="mt-8" method="POST">
                        @method('DELETE')
                        @csrf


                        <input type="submit" value="Eliminar Publicación"
                            class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer">
                    </form>
                @endif
            @endauth

        </div>

        <div>
            Formulario de comentarios
        </div>
    </div>
@endsection
