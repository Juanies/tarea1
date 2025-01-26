@extends('layout.principal')

@section('titulo')
    Productos
@endsection

@section('cabecera')
    Productos
@endsection

@section('contenido')


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <a href="{{route("products.create")}}">
            <i class="fas fa-add">NUEVO</i>
        </a>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-16 py-3">
                    <span class="sr-only">Image</span>
                </th>
                <th scope="col" class="px-6 py-3">
                    Product
                </th>
                <th scope="col" class="px-6 py-3">
                    Descripcion
                </th>
                <th scope="col" class="px-6 py-3">
                    Stock
                </th>
                <th scope="col" class="px-6 py-3">
                    Categoria
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
                @foreach($products as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="p-4">
                            <img src="{{Storage::url($item->imagen)}}" class="w-16 md:w-32 max-w-full max-h-full" alt="Apple Watch">
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{$item->nombre}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->descripcion}}
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{$item->stock}}
                        </td>
                        <td>
                            {{$item->category->nombre}}
                        </td>
                        <td class="px-6 py-4">
                            <form method="POST" action="{{route("products.destroy", $item)}}">
                                @csrf
                                @method("delete")
                                <a class="mr-2" href="{{route("products.edit", $item)}}"><i class="fas fa-edit text-blue-500"></i></a>
                                <button type="submit"><i class="fas fa-trash text-red-500"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-2">
            {{ $products->links() }}
        </div>
    </div>

@endsection
@section("alertas")
@endsection

