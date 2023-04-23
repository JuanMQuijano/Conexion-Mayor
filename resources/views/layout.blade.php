<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Conexión-Mayor | @yield('pagina')</title>


    @vite('resources/css/app.css')
    @vite('resources/css/menu.css')
</head>

<body class="h-screen">
    <header class="flex flex-col items-center justify-between border shadow p-2 md:flex-row ">

        <div class="flex items-center justify-between w-full">
            <a href="{{ route('dashboard') }}" class="text-4xl text-blue-500">Conexión<span
                    class="text-black">-</span><span class="text-amber-500">Mayor</span></a>

            <div id="btn-menu" class="md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </div>
        </div>


        <nav id="menu" class="mostrar flex flex-col items-center gap-5 md:flex md:flex-row">
            @guest
                <div class="md:w-64 md:flex md:justify-between">
                    <a href="{{ route('login') }}" class="md:text-lg lg:text-xl hover:underline">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="md:text-lg lg:text-xl hover:underline">Crear Cuenta</a>
                </div>
            @endguest

            @auth

                <div class="flex flex-col items-center md:flex-row md:w-1/2">

                    <div class="flex flex-col md:flex-row md:mr-10 md:gap-10">
                        <a href="{{ route('ofertas') }}" class="md:text-lg lg:text-xl hover:underline">Ofertas</a>
                        <a href="{{ route('solicitudes') }}" class="md:text-lg lg:text-xl hover:underline">Solicitudes</a>
                    </div>


                    <div class="flex flex-col md:flex-row items-center md:gap-10">
                        <a href="{{ route('posts/create') }}" class="md:text-lg lg:text-xl hover:underline">Crear
                            Publicación</a>
                        <a href="{{ route('perfil', auth()->user()->username) }}"
                            class="md:text-lg lg:text-xl hover:underline">{{ auth()->user()->username }}</a>
                        <a href="{{ route('logout') }}"
                            class="bg-blue-700 rounded text-white p-1 text-md hover:bg-blue-800">Cerrar
                            Sesión</a>
                    </div>
                </div>
            @endauth
        </nav>
    </header>

    @yield('contenido')

    <footer>

    </footer>
    @livewireScripts
    @vite('resources/js/app.js')
</body>

</html>
