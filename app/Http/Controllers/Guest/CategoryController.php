<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $sortName;
    protected $activeSortName;

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
     * Получить все ключи сортировки продуктов в категории
     * @return void
     */
    protected function getSortNamesArray(){
        return [
            "popular" => 'популярности',
            "rate" => 'рейтингу',
            "priceAsc"  => 'цена',
            "priceDesc" => 'цена',
            "sale" => 'скидке',
            "newly" => 'обновлению',
        ];
    }

    /**
     * Получить ключ сортировки по умолчанию
     * @param $key можно выбрать нужный ключ по индексу
     * @return int|string
     */
    protected function getDefaultSortName($key = 0){
        return $this->getSortNameKeyById($key);
    }

    /**
     * Получить ключ сортировки по индексу массива
     * @param $key можно выбрать нужный ключ по индексу
     * @param $key
     * @return int|string
     */
    protected function getSortNameKeyById($key = 0){
        return array_keys($this->getSortNamesArray())[$key];
    }

    /**
     * Получить выбранный пользователем метод сортировки
     * @param $request
     * @return void
     */
    protected function getUserCheckedSortName($request){
        if (!$request->sort){
            return false;
        }
        $sort = $request->sort;
        if (!array_key_exists($sort, $this->getSortNamesArray())){
            $sort = $this->getDefaultSortName();
        }

        return $sort;
    }

    /**
     * @param $products
     * @return void
     */
    protected function getSortedProductsBySortName($categoryId, $sortName)
    {
        $products = Product::where('category_id', $categoryId)
            //->leftJoin('galleries', 'galleries.parent_id','=','products.id')
            //->select('products.*', 'galleries.image', 'galleries.is_main')
        ;

        switch($sortName){
            case $this->getSortNameKeyById(0):
                $sortedProducts = $products->orderBy('id', 'asc'); break;
            case $this->getSortNameKeyById(1):
                $sortedProducts = $products->orderBy('id', 'asc'); break;
            case $this->getSortNameKeyById(2):
                $sortedProducts = $products->orderBy('price', 'asc'); break;
            case $this->getSortNameKeyById(3):
                $sortedProducts = $products->orderBy('price', 'desc'); break;
            case $this->getSortNameKeyById(4):
                $sortedProducts = $products->orderBy('id', 'asc'); break;
            case $this->getSortNameKeyById(5):
                $sortedProducts = $products->orderBy('id', 'desc'); break;
            default:
                $sortedProducts = $products->orderBy('id', 'asc'); break;
        }

        $sortedProducts = $sortedProducts->get();

        return $sortedProducts;
    }

    /**
     * Вернуть спиоск ключей сортировки, удалив один из них, связанное с ценой.
     * @param $sortName
     * @return string[]|void
     */
    protected function getPriceExcludedsortNames($sortName)
    {
        $priceAsc  = 'priceAsc';
        $priceDesc = 'priceDesc';
        $sortNames = $this->getSortNamesArray();

        if ($this->sortName == $priceAsc){
            $this->sortName = $priceAsc;
            $this->activeSortName = $priceDesc;
            unset($sortNames[$priceAsc]);
        }elseif ($this->sortName == $priceDesc){
            $this->sortName = $priceDesc;
            $this->activeSortName = $priceAsc;
            unset($sortNames[$priceDesc]);
        }else{
            $this->activeSortName = $this->sortName;
            unset($sortNames[$priceDesc]);
        }

        //dump($this->sortName);
        //dump($this->activeSortName);
        return $sortNames;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Request $request)
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

        // исходя из параметра sort
        // 1. сделать сортировку
        // 2. узнать, какая ссылка будет активной
        $userCheckedSortName = $this->getUserCheckedSortName($request);
        $this->sortName = $userCheckedSortName ? $userCheckedSortName : $this->getDefaultSortName();

        $priceExcludedsortNames   = $this->getPriceExcludedsortNames($this->sortName);
        $sortedProductsBySortName = $this->getSortedProductsBySortName($category->id, $this->sortName);

        //dump($this->sortName);
        // $products->count();
        //dump($products->find($products->count()-1)->images);
        //die;

        return view('guest.products.index', [
            'categories' => $categories,
            'parentCategory' => $parentCategory,
            'currentCategory' => $category,
            'childCategories' => $childCategories,
            'breadCrumbs' => $breadCrumbs,
            'products' => $sortedProductsBySortName,
            'priceExcludedsortNames' => $priceExcludedsortNames,
            'activeSortName' => $this->activeSortName,
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
