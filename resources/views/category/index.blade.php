@extends('layout.principal')

@section('titulo')
    Categorias
@endsection

@section('cabecera')
    Categorias
@endsection

@section('contenido')


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <a href="{{route("categories.create")}}">
            <i class="fas fa-add">NUEVO</i>
        </a>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>

                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Color
                </th>

                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($categorias as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                        {{$item->nombre}}
                    </td>
                    <td class="px-6  py-4">
                        <div class=" rounded-xl bg-[{{$item->color}}] p-5 text-white">
                            {{$item->color}}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <form method="POST" action="{{route("categories.destroy", $item)}}">
                            @csrf
                            @method("delete")
                            <a class="mr-2" href="{{route("categories.edit", $item)}}"><i class="fas fa-edit text-blue-500"></i></a>
                            <button type="submit"><i class="fas fa-trash text-red-500"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
@section('alertas')
    <x-alerta />
@endsection
