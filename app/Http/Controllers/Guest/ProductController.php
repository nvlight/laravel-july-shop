<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
     * Выдать путь до рисунка для разрешения c246x328
     * @param $product
     * @param $image
     * @return string
     */
    protected function image_c246x328_path($product, $image)
    {
        return asset(env('PRODUCT_IMAGES_SHOW_PATH')
            . $product
            . env('PRODUCT_IMAGES_SHOW_c246x328_folder')
            . $image
        );
    }

    /**
     * Выдать путь до рисунка для разрешения big
     * @param $product
     * @param $image
     * @return string
     */
    protected function image_big_path($product, $image)
    {
        return asset(env('PRODUCT_IMAGES_SHOW_PATH')
            . $product
            . env('PRODUCT_IMAGES_SHOW_big_folder')
            . $image
        );
    }

    public function show(Product $product)
    {
        $categories = Category::where('parent_id', 0)->get();

        $sliderImages = $product->images;
        if (count($sliderImages)){
            //dd($sliderImages);
            $sliderImages = $sliderImages
                ->pluck('image')
                ->toArray()
            ;
            $newImages = [];
            foreach($sliderImages as $image){
                //$newImages[] = asset(env('PRODUCT_IMAGES_SHOW_PATH') . $image);
                $newImages[] = $this->image_c246x328_path($product->id, $image);
            }
            $sliderImages = $newImages;
            //dd($sliderImages);
        }

        // todo: 900 * 1200, это размер главной картинки слайдера на десктопе
        // todo: 516 * 688,  это размеры картинок, когда показывается список продуктов на десктопе
        // todo: 246 * 328,  это размеры маленьких картинок слайдера на десктопе, она также в верхней всплывашке

        return view('guest.products.show.show_product', [
            'product' => $product,
            'categories' => $categories,
            'sliderImages' => $sliderImages,
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

    /**
     * Получение картинок продукта по Id Ajax запросом
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    function productImagesAjax(Product $product)
    {
        $rs = [];
        try {
            $images = $product->images;
            $rs['success'] = true;
            $rs['message'] = 'Получены картинки продукта';

            $newImages = [];
            foreach($images as $image){
                //$image->image = asset(env('PRODUCT_IMAGES_SHOW_PATH') . $image->image);
                $image->image = $this->image_big_path($product->id, $image->image);
                $newImages[] = $image;
            }

            $rs['images'] = $newImages;
        }catch (\Exception $e){
            $rs['success'] = false;
            $rs['message'] = 'Error with request: ' . $e->getMessage();
        }

        return response()->json($rs);
    }
}
