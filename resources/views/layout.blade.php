<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Conexión-Mayor | @yield('pagina')</title>


    @vite('resources/css/app.css')
</head>

<body class="h-screen">
    <header class="flex flex-col justify-center items-center md:flex-row md:justify-between border shadow p-2">
        <h1 class="text-4xl text-blue-500">Conexión<span class="text-black">-</span><span
                class="text-amber-500">Mayor</span></h1>

        <nav class="flex items-center gap-5 @auth
            flex-col md:flex-row p-2 md:p-0
        @endauth">
            @guest
                <a href="{{ route('login') }}" class="text-xl hover:underline">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="text-xl hover:underline">Crear Cuenta</a>
            @endguest

            @auth
                <a href="{{ route('posts/create') }}" class="text-xl hover:underline">Crear Publicación</a>
                <a href="{{ route('perfil', auth()->user()->username) }}"
                    class="text-xl hover:underline">{{ auth()->user()->username }}</a>
                <a href="{{ route('logout') }}" class="bg-blue-700 rounded text-white p-1 text-md hover:bg-blue-800">Cerrar
                    Sesión</a>
            @endauth
        </nav>
    </header>

    @yield('contenido')

    <footer>

    </footer>
    @livewireScripts
</body>

</html>
