@extends('layout')

@section('pagina')
    {{ $user->username }}
@endsection

@section('contenido')
    <div class="container mx-auto my-10">
        <h1 class="font-bold text-lg uppercase">Publicaciones de {{ $user->username }}</h1>

        <div class="grid grid-cols-4 gap-8 mt-10">

            @forelse ($posts as $post)
                <div class="shadow shadow-slate-600">
                    <img src="/uploads/{{ $post->image }}" alt="Imagen Post {{ $post->name }}">
                    <a class="font-bold text-lg"
                        href="{{ route('posts/show', [$post->post_owner->username, $post]) }}">{{ $post->name }}</a>
                </div>
            @empty
                <p class="bg-blue-500 text-white p-1 text-lg rounded text-center">Aún no hay Posts
                    <a href="{{ route('posts/create') }}" class="underline">Crea uno</a>
                </p>
            @endforelse

        </div>
    </div>
@endsection
