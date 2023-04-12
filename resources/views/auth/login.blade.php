@extends('layout')

@section('pagina')
    Login
@endsection

@section('contenido')
    <div class="h-4/5 flex items-center justify-center my-10 md:my-20">
        <form class="rounded shadow-lg shadow-black p-5 w-96" action="{{ route('login/store') }}" method="POST">

            @csrf

            @if (session('mensaje'))
                <p class="bg-green-500 text-white my-2 rounded-lg text-sm p-2 text-center uppercase">{{ session('mensaje') }}
                </p>
            @endif

            @if (session('mensaje_error'))
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center uppercase">
                    {{ session('mensaje_error') }}
                </p>
            @endif

            <h1 class="text-3xl text-center mt-5 text-blue-500">Conexión<span class="text-black">-</span><span
                    class="text-amber-500">Mayor</span></h1>

            <h1 class="text-2xl text-center mb-5">¡Inicia Sesión!</h1>

            <div class="flex flex-col">
                <label for="email" class="font-bold">Email</label>
                <input class="p-2 border border-gray-400 rounded" type="email" name="email" id="email"
                    value="{{ old('email') }}" placeholder="Ingresa tu Email">

                @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center uppercase">{{ $message }} </p>
                @enderror

            </div>

            <div class="flex flex-col mt-2">
                <label for="password" class="font-bold">Password</label>
                <input class="p-2 border border-gray-400 rounded"type="password" name="password" id="password"
                    placeholder="Ingresa tu Password">

                @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center uppercase">{{ $message }} </p>
                @enderror
            </div>


            <button class="bg-blue-500 text-white mt-5 w-full p-2 rounded text-xl hover:bg-blue-600">Iniciar Sesión</button>
            <div class="w-full flex justify-center mt-2">
                <a href="{{ route('register') }}" class="text-sm hover:underline">¿Aún no tienes cuenta? Crea
                    una</a>
            </div>
        </form>
    </div>
@endsection
