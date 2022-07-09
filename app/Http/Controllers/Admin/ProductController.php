<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', 0)->get();

        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->fill($request->all());
        $product->save();

        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //return $product;

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::where('parent_id', 0)->get();

        return view('admin.product.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //dump($request->all());
        try{
            $product->fill($request->all());
            $product->save();
        }catch (\Exception $e){
            session()->flash('update_product', ['success' => false, 'message' => 'Ошибка при обновлении продукта!']);
            return redirect()->route('admin.category.edit', $product->id);
        }

        session()->flash('update_product', ['success' => true, 'message' => 'Продукт обновлен!']);
        return redirect()->route('admin.product.edit', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (count($product->images)) {
            session()->flash('product_delete',
                ['success' => false,
                'message' => 'К продукты прикреплены картики, сначала нужно удалить их, а потом сам продукт!']);
            return redirect()->route('admin.product.index');
        }

        try{
            $product->delete();
        }catch (\Exception $e){
            session()->flash('product_delete', ['success' => false, 'message' => 'Ошибка при удалении продукта!']);
            return redirect()->route('admin.product.index');
        }

        session()->flash('product_delete', ['success' => true, 'message' => 'Продукт удален']);
        return redirect()->route('admin.product.index');
    }
}
