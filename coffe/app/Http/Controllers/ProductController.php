<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Product::paginate(10);
        return view('productos.index')->with('productos', $productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $producto = new Product;
        $producto->name = $request->name;
        $producto->ref = $request->ref;
        $producto->price = $request->price;
        $producto->weight = $request->weight;
        $producto->category = $request->category;
        $producto->stock = $request->stock;

        if ($producto->save()) {
            return redirect()->route('admin.productos.index')->with('message', 'El producto: ' . $producto->name . ' fue agregado con Exito!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Product::findOrFail($id);
        return view('productos.show')->with('producto', $producto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Product::find($id);
        return view('productos.edit')->with('producto', $producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->name = $request->name;
        $product->ref = $request->ref;
        $product->price = $request->price;
        $product->weight = $request->weight;
        $product->category = $request->category;
        $product->stock = $request->stock;

        if ($product->save()) {
            return redirect()->route('admin.productos.index')->with('message', 'El producto: ' . $product->name . ' fue modificado con Exito!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Product::findOrFail($id);
        if ($producto->delete()) {
            return redirect()->route('admin.productos.index')->with('message', 'El producto: ' . $producto->name . ' fue borrado con Exito!');
        }
    }
}
