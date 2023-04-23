@extends('layout')

@section('pagina')
    {{ $post->name }}
@endsection

@section('contenido')
    <div class="container mx-auto mt-10 flex flex-col md:flex-row items-center">
        <div class="w-2/4 flex flex-col items-center justify-center">
            <img src="/uploads/{{ $post->image }}" alt="Imagen Publicacíon {{ $post->name }}"
                class="w-full mx-auto shadow-xl">

            <div class="flex justify-between w-full mt-5">
                <a href="{{ route('perfil', $post->post_owner->username) }}"
                    class="font-bold">{{ $post->post_owner->username }}</a>

                <livewire:like-component :post="$post" />
            </div>

            <div class="flex flex-col w-full mx-auto mt-8">
                <div class="break-words">
                    <p>{{ $post->description }}</p>
                </div>
                <p class="font-bold">{{ $post->created_at->diffForHumans() }}</p>
            </div>

            @guest
                <div class="mt-5">
                    <p class="text-gray-500">Inicia Sesión para interactuar con esta publicación</p>
                </div>
            @endguest
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

        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                <livewire:comentario-component :post="$post" />
            </div>
        </div>
    </div>
@endsection
