@extends('layout')

@section('pagina')
    Solicitudes
@endsection

@section('contenido')
    <div class="container mx-auto my-10">
        <h1 class="font-bold text-lg uppercase">Últimas Solicitudes</h1>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-8 mt-10">

            @forelse ($posts as $post)
                <div class="shadow shadow-slate-600">
                    <img src="/uploads/{{ $post->image }}" alt="Imagen Post {{ $post->name }}">

                    <div class="flex justify-between">
                        <a class="font-bold text-lg"
                            href="{{ route('posts/show', [$post->post_owner->username, $post]) }}">{{ $post->name }}</a>
                        <div class="flex gap-2 items-center mr-5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                            <p class="font-bold">
                                {{ count($post->likes) }}
                            </p>
                        </div>
                    </div>

                    <div>
                        <a href="{{ route('perfil', $post->post_owner->username) }}">{{ $post->post_owner->username }}</a>
                    </div>

                </div>
            @empty
                <p class="bg-blue-500 text-white p-1 text-lg rounded text-center">Aún no hay Posts
                    <a href="{{ route('posts/create') }}" class="underline">Crea uno</a>
                </p>
            @endforelse

        </div>

        <div class="my-5">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
