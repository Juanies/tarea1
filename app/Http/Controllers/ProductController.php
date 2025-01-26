<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function basename;
use function dd;
use function redirect;
use function view;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(5);
        return view('products.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Category::all();
        return view('products.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules());

        $product = Product::create([
            "nombre" => $request->nombre,
            "descripcion" => $request->descripcion,
            "stock" => $request->stock,
            "imagen" => ($request->imagen) ? $request->imagen->store('images/products') : 'images/noimage.png',
            "category_id"=> $request->category_id,
            ]);

        return redirect()->route('products.index')->with('mensaje', 'Producto agregado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categorias = Category::all();
        return view('products.edit', compact('product', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate($this->rules($product->id));
        $imagen = $product->imagen;
        $product->update([
            "nombre" => $request->nombre,
            "descripcion" => $request->descripcion,
            "stock" => $request->stock,
            "imagen" => ($request->imagen) ? $request->imagen->store('images/products') : $product->imagen,
            "category_id"=> $request->category_id,
        ]);

        if ($request->imagen && basename($product->imagen != "noimage.png")) {
            Storage::delete("$imagen");
        }

        return redirect()->route('products.index')->with("mensaje", "Producto actualizado");
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Product $product)
    {
        if(basename($product->imagen) != "noimage.png"){
            Storage::delete($product->imagen);
        }
        $product->delete();
        return redirect()->route('products.index')->with('mensaje', 'Producto eliminado');
    }



    private function rules(?int $id = null): array
    {
        return [
            'nombre' => ['required', 'string', 'min:4', 'max:32', 'unique:products,nombre,' . $id],
            'descripcion' => ['required', 'string', 'max:255'],
            'imagen' => ['nullable', 'image', 'max:2048'],
            'stock' => ['required', 'integer', 'min:0'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }
}
