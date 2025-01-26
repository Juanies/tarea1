<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use function dd;
use function view;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Category::all();
        return view('category.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules());

        Category::create($request->all());
        return redirect()->route('categories.index')->with("mensaje", "Categoria creada");

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate($this->rules($category->id));
        $category->update($request->all());
        return redirect()->route('categories.index')->with("mensaje", "Producto actualizado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with("mensaje", "Producto eliminado");
    }


    private function rules(?int $id = null): array
    {
        return [
            'nombre' => ['required', 'string', 'min:4', 'max:32', 'unique:categories,nombre,' . $id],
            'color' => ['required', 'color-hex'],
        ];
    }

}
