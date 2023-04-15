@extends('layout')

@section('pagina')
    Crear Publicación
@endsection

@section('contenido')
    <div class="container mt-10 mx-auto p-2 shadow shadow-slate-500 rounded-lg">

        <h1 class="font-bold text-4xl text-center">Crear Publicación</h1>

        <form action="{{ route('posts/store') }}" class="flex flex-col w-5/12 mx-auto mt-10" method="POST" enctype="multipart/form-data">
            @csrf


            @error('name')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center uppercase">{{ $message }} </p>
            @enderror
            @error('description')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center uppercase">{{ $message }} </p>
            @enderror
            @error('image')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center uppercase">{{ $message }} </p>
            @enderror
            <div class="flex justify-between my-2 gap-5">
                <label for="name" class="font-bold text-lg w-1/6">Título</label>
                <input type="text" name="name" id="name" class="flex-1 border border-gray-300 rounded"
                    placeholder="Título Publicación" value="{{old("name")}}">
            </div>

            <div class="flex my-2 gap-5">
                <label for="description" class="font-bold text-lg w-1/6">Descripción</label>
                <textarea name="description" id="description" class="flex-1 border border-gray-300 rounded h-40"
                    placeholder="Descripción Publicación">{{old("description")}}</textarea>
            </div>

            <div class="flex justify-between my-2 gap-5">
                <label for="image" class="font-bold text-lg w-1/6">Imagen</label>
                <input type="file" name="image" id="image" class="flex-1" accept="image/*">
            </div>

            <input type="submit" value="Crear Publicación"
                class="mt-10 p-2 text-white bg-blue-500 rounded w-2/6 mx-auto hover:cursor-pointer hover:bg-blue-600">
        </form>
    </div>
@endsection
