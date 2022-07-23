<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Добавление к рисунку суффикса в видер расширения
     * @param $image
     * @param $ext
     * @return string
     */
    protected function getImgWithWebPConcated($image, $ext='.webp')
    {
        return $image . $ext;
    }

    /**
     * Добавление к рисунку суффикса в видер расширения статично
     * @param $image
     * @param $ext
     * @return string
     */
    public static function getImgWithWebPConcated_static($image, $ext='.webp')
    {
        return $image . $ext;
    }

    /**
     * Получить имя рисунка с полного пути рисунка статично
     * @param string $image
     * @return mixed|string
     */
    public function extractImgNameFromFullName(string $image)
    {
        return explode('/', $image)[ count(explode('/', $image)) -1];
    }

    /**
     * Получить имя рисунка с полного пути рисунка статично
     * @param string $image
     * @return mixed|string
     */
    public static function extractImgNameFromFullName_static(string $image)
    {
        return explode('/', $image)[ count(explode('/', $image)) -1];
    }

    /**
     * Возвращает полный путь картинки для мобильного разрешения
     * @param int $productId
     * @param $image
     * @return string
     */
    public static function image_c246x328_path_static(int $productId, $image)
    {
        return config('product.gallery.paths.products_show_path')
            . '/' . $productId . '/'
            . config('product.gallery.paths.c246x328') . '/'
            . self::getImgWithWebPConcated_static(
                self::extractImgNameFromFullName_static($image)
            );
    }

    /**
     * Возвращает полный путь картинки для таблет разрешения
     * @param int $productId
     * @param $image
     * @return string
     */
    public static function image_c516x688_path_static(int $productId, $image)
    {
        return config('product.gallery.paths.products_show_path')
            . '/' . $productId . '/'
            . config('product.gallery.paths.c516x688') . '/'
            . self::getImgWithWebPConcated_static(
                self::extractImgNameFromFullName_static($image)
            );
    }

    /**
     * Возвращает полный путь картинки для десктопного разрешения
     * @param int $productId
     * @param $image
     * @return string
     */
    public static function image_big_path_static(int $productId, $image)
    {
        return config('product.gallery.paths.products_show_path')
            . '/' . $productId . '/'
            . config('product.gallery.paths.big') . '/'
            . self::getImgWithWebPConcated_static(
                self::extractImgNameFromFullName_static($image)
            );
    }

    /**
     * Выдать путь до рисунка для разрешения c246x328
     * @param $product
     * @param $image
     * @return string
     */
    protected function image_c246x328_path($product, $image)
    {
        return asset(config('product.gallery.paths.products_show_path')
            . '/' . $product . '/'
            . config('product.gallery.paths.c246x328') . '/'
            . $this->getImgWithWebPConcated(
                $this->extractImgNameFromFullName($image)
            ),
        );
    }

    /**
     * Показать продукт
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
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
                $newImages[] = $this->image_c246x328_path($product->id, $image);
            }
            $sliderImages = $newImages;
        }

        return view('guest.products.show.show_product', [
            'product' => $product,
            'categories' => $categories,
            'sliderImages' => $sliderImages,
        ]);
    }

    /**
     * Получение картинок пресета big продукта по Id Ajax запросом
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
                $image->image = asset(self::image_big_path_static($product->id, $image->image));
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
