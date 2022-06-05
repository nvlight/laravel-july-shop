<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('parent_id', 0)->get();

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', 0)->get();

        return view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //dump($request->all());

        $product = new Category();
        $product->fill($request->all());
        $product->save();

        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //return $category;
        //dump($category);

        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //return $category;
        $categories = Category::where('parent_id', 0)->get();

        return view('admin.category.update', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //dump($request->all());
        //dump($category);
        //die;

        $haveChilds = count($category->children);
        //dump($haveChilds);

        if ($category->parent_id != $request->parent_id && $haveChilds){ // $haveChilds &&
            session()->flash('category_update', ['success' => false, 'message' => 'Нельзя перенести категорию, у которого есть потомки!']);
            return redirect()->route('admin.category.edit', $category->id);
        }

        try{
            $category->fill($request->all());
            $category->save();
        }catch (\Exception $e){
            session()->flash('category_update', ['success' => false, 'message' => 'Ошибка при обвнолении категории!']);
            return redirect()->route('admin.category.edit', $category->id);
        }

        session()->flash('category_update', ['success' => true, 'message' => 'Категория обновлена']);
        return redirect()->route('admin.category.edit', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $haveChilds = count($category->children);
//        if (session()->has('category_delete')){
//            session()->remove('category_delete');
//        }

        if ($haveChilds){
            session()->flash('category_delete', ['success' => false, 'message' => 'Нельзя удалить категорию, у которого есть потомки!']);
            return back();
        }

        try{
            $category->delete();
        }catch (\Exception $e){
            session()->flash('category_delete', ['success' => false, 'message' => 'Ошибка при удалении категории!']);
            return redirect()->route('admin.category.index');
        }

        session()->flash('category_delete', ['success' => true, 'message' => 'Категория удалена']);
        return redirect()->route('admin.category.index');

        //dump($category);
        //dump(count($category->children));
        //return $category;
    }
}
