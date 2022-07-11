<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Получить массив хлебных крошек!
     * @param $current
     * @return array
     */
    protected function getBreadcrumbs($current)
    {
        $breadCrumbs = [];

        while($current){
            $breadCrumbs[] = $current;
            $current = $current->parent;
        }
        return array_reverse($breadCrumbs);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $parentCategory = $category->parent;
        $childCategories = ($category->children);
        $isChildCategories = count($childCategories) ? 1 : 0;

        $breadCrumbs = $this->getBreadcrumbs($category);
        //dd($breadCrumbs);

        $categories = Category::where('parent_id', 0)->get();

        if ($isChildCategories){
            return view('guest.index_with_children_categories', [
                'categories' => $categories,
                'parentCategory' => $parentCategory,
                'currentCategory' => $category,
                'childCategories' => $childCategories,
                'breadCrumbs' => $breadCrumbs,
            ]);
        }

        $products = Product::where('category_id', $category->id)
            //->leftJoin('galleries', 'galleries.parent_id','=','products.id')
            //->select('products.*', 'galleries.image', 'galleries.is_main')
            ->get();

        //dump($products);
        // $products->count()
        //dump($products->find($products->count()-1)->images);
        //die;

        return view('guest.products.index', [
            'categories' => $categories,
            'parentCategory' => $parentCategory,
            'currentCategory' => $category,
            'childCategories' => $childCategories,
            'breadCrumbs' => $breadCrumbs,
            'products' => $products,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
