@extends('layout.principal')

@section('titulo')
    Crear Productos
@endsection

@section('cabecera')
    Crear Productos
@endsection

@section('contenido')
    <form enctype="multipart/form-data" method="POST" action="{{route("products.store")}}" class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md">

        @csrf
        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" id="nombre" value="{{@old("nombre")}}" name="nombre" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
            <x-error for="nombre" />

        </div>

        <div class="mb-4">
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea id="descripcion"  name="descripcion" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >{{@old("descripcion")}}</textarea>
            <x-error for="descripcion" />

        </div>

        <div class="mb-4">
            <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen</label>
            <input type="file" id="imagen" name="imagen" class="mt-1 block w-full text-sm text-gray-500 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-indigo-100 file:text-indigo-700 hover:file:bg-indigo-200">
            <x-error for="imagen" />

        </div>

        <div class="mb-4">
            <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
            <input value="{{@old("stock")}}" type="number" id="stock" name="stock" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
            <x-error for="stock" />

        </div>

        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
            <select id="category_id" name="category_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Seleccionar categoría</option>
                @foreach($categorias as $item)
                    <option value="{{ $item->id }}" @selected(old('category_id') == $item->id)>{{ $item->nombre }}</option>
                @endforeach
            </select>
            <x-error for="category_id" />
        </div>

        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Enviar</button>
    </form>

@endsection
@section('alertas')
    <x-alerta />
@endsection
