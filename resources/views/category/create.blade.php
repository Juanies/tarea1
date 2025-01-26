@extends('layout.principal')

@section('titulo')
    Crear categoria
@endsection

@section('cabecera')
    Crear categoria
@endsection

@section('contenido')
    <form method="POST" action="{{route("categories.store")}}" class="p-4 max-w-sm mx-auto bg-white rounded-xl shadow-md">
        @csrf
        <!-- Campo de Nombre -->
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-semibold mb-1">Nombre</label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                value="{{@old("nombre")}}"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            />
            <x-error for="nombre" />

        </div>

        <!-- Campo de Color -->
        <div class="mb-4">
            <label for="color" class="block text-gray-700 font-semibold mb-1">Color</label>
            <input
                type="color"
                id="color"
                name="color"
                value="{{@old("nombre", "#0000")}}"
                class="w-full h-10 border border-gray-300 rounded-lg cursor-pointer"
            />
            <x-error for="color" />

        </div>

        <!-- Botón de Enviar -->
        <div>
            <button
                type="submit"
                class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 transition">
                Enviar
            </button>
        </div>
    </form>

@endsection
@section("alertas")
@endsection

