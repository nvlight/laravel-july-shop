<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Admin\ImageCompressionController as ImageCompression;

class GalleryController extends Controller
{


    protected $maxImgsCountForProduct;

    public function __construct()
    {
        $this->maxImgsCountForProduct = config('product.gallery.max_upload_image_count');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$galleries = Gallery::all();
        $galleries = Gallery::
              join('products', 'products.id', '=', 'galleries.parent_id')
            ->select('galleries.*', 'products.title', 'products.id as product_id')
            ->orderBy('products.id', 'desc')
            ->orderBy('galleries.is_main', 'desc')
            ->get()
            //->toArray()
        ;
        //dump($galleries);

        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();

        return view('admin.gallery.create', compact('products'));
    }

    /**
     * Сохранить картинку с номером и путем
     * @param $image
     * @return array
     */
    protected function saveImage($image, $path='', $imageNumber='1')
    {
        $result = [];
        $originalName  = $image->getClientOriginalName();
        $baseName = Str::random() . '___' . time() . '-' . $imageNumber;
        $name = $baseName . '.' . $image->extension();

        try {
            Storage::disk('public')->putFileAs($path, $image, $name); // ->put($image_name, $image);

            $result['clientOriginalName'] = $originalName;
            $result['name']     = $name;
            $result['baseName'] = $baseName;
            $result['fullName'] = $path . '/' . $name;
            $result['success'] = true;
        } catch (\Exception $e) {
            $result['success'] = false;
            $result['message'] = 'file upload is failed!';
        }

        return $result;
    }

    /**
     * Получить путь сохранения оригинальной картинки вместе с ИД продукта.
     * @param int $productId
     * @return string
     */
    protected function getProductImageSavePath(int $productId)
    {
        $path = config('product.gallery.paths.products_path');
        $path .= '/' . $productId . '/';
        $path .= config('product.gallery.paths.orig_path');

        return $path;
    }

    /**
     * Сохранить загруженные картинки
     * @return array
     */
    protected function saveUploadImages(int $productId)
    {
        if (! \request()->exists('image')){
            $result = ['success' => false, 'message' => 'there is no image in request!'];
            return $result;
        }

        $uploadedImages = [];
        $images = request()->file('image');

        $result = ['success' => true, 'message' => 'all files uploaded!'];

        $i = 1;
        foreach($images as $image) {
            $path = $this->getProductImageSavePath($productId);
            $this->saveImage($image, $i, $path);

//            $originalName = $image->getClientOriginalName();
//            $newImageName = Str::random() . '---' . time() . '.' . $image->extension();
//            try {
//                Storage::disk('public')->putFileAs('', $image, $newImageName);// ->put($image_name, $image);
//                $tmp = [];
//                $tmp['newImageName'] = $newImageName;
//                $tmp['originalName'] = $originalName;
//                $uploadedImages[] = $tmp;
//            } catch (\Exception $e) {
//                $result = ['success' => false, 'message' => 'file upload is failed!'];
//                return $result;
//            }

            $i++;
        }

        $result['uploaded'] = $uploadedImages;

        return $result;

        // for download file
        //return Storage::disk('public')->download($newImageName, $originalName);
    }

    /**
     * Помечает картинку не главной
     * @param int $productId
     * @return bool
     */
    protected function resetMainImage(int $productId){
        $imgs = Gallery::where('parent_id', $productId)->get();
        if ($imgs){
            foreach ($imgs as $img){
                $img->is_main = 0;
                $img->save();
            }
        }
        return true;
    }

    /**
     * Добалвяет к запросу where c нужным column && value
     * @param $column
     * @param $equal
     * @return mixed
     */
    protected function productImagesCountByColumnAndValue($column, $value)
    {
        return Gallery::where($column, $value)->count();
    }

    /**
     * Может быть только (maxImgsCountForProduct например 5) картинок для 1 продукта
     * @param $request
     * @return bool
     */
    protected function isProductHaveMaxImageCount($parentId, $requestImageCount)
    {
        $result = [];
        $productImagesCount = $this->productImagesCountByColumnAndValue('parent_id', $parentId);
        $result['currentProductImageCount'] = $productImagesCount;
        $diff = $productImagesCount + $requestImageCount - $this->maxImgsCountForProduct;
        $result['diff'] = $diff;

        $result['success'] = !($diff > 0);

        return $result;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGalleryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGalleryRequest $request)
    {
        $diffProductImages = $this->isProductHaveMaxImageCount($request->parent_id, count($request->image));
        if ( !($diffProductImages['success']) ){
            session()->flash('default_message',
                [
                    'success' => false,
                    'message' => "Максимальное количество изображений для одного продукта = {$this->maxImgsCountForProduct}, " .
                        " превышение составило {$diffProductImages['diff']} картинок",
                ]);
            return redirect()->route('admin.gallery.index');
        }

        // todo - сохранение картинки и записи в бд нужно отрефакторить, обе действия делать не по отдельности
        // todo   а в цикле и также в цикле перехватывать ошибки
        $uploadedFiles = $this->saveUploadImages($request->parent_id);

        // now save to DB all filenames with gallery
        $i = 1;
        $isMain = ( $request->is_main > (count($request->image))) ? 1 : $request->is_main;
        foreach($uploadedFiles['uploaded'] as $file){

            $gallery = new Gallery();
            $gallery->parent_id = $request->parent_id;
            //$tmp['newImageName'] = $newImageName;
            //$tmp['originalName'] = $originalName;
            $gallery->image = $file['newImageName'];

            if ($i == $isMain){
                $this->resetMainImage($gallery->parent_id);
                $gallery->is_main = 1;
            }

            // todo - add check for save();
            $gallery->save();
            $i++;
        }

        session()->flash('gallery_images_created',
            ['success' => true,
             'message' => 'Картинки продукта сохранены!']);

        return redirect()->route('admin.gallery.index');
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        return view('admin.gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.update', compact('gallery'));
    }

    /**
     * Тестирование функции сжатия файла и создания 3-х пресетов
     * @return void
     */
    public function test_compress_image()
    {
        $staticImg = "86s2TBWmig9n1NIi___1658421247-1.jpg";
        $fullImgPath = config('product.gallery.paths.products_show_path') . '/17/'
                     . config('product.gallery.paths.orig_path') . $staticImg;

        $imgPresets = config('product.gallery.convert_presets');
        $imgPresetsPath = [];
        foreach($imgPresets as $key => $value){
            $staticPart = config('product.gallery.paths.products_show_path') . '/17/';
            $convFullImgPath = $staticPart . $key . $staticImg;
            $imageCompress = ImageCompression::convertToWebp($fullImgPath, $convFullImgPath, $value['width'], $value['height']);
            //dump($imageCompress);
            $imgPresetsPath[$key] = [
                'src' => $imageCompress['image'],
                'width' => $value['width'],
                'height' => $value['height'],
            ];
        }

        $fullImgPathAsset = asset($fullImgPath);
        return view('admin.gallery.test.test_compress_image',
                compact('fullImgPath', 'fullImgPathAsset', 'imgPresetsPath'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGalleryRequest  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        //dump($request->all());
        //dump($gallery);
        //dump($request->exists('is_main'));
        //dump($request->exists('image'));

        if (!$request->exists('is_main') && !$request->exists('image')){
            $defaultFlash = ['success' => true, 'message' => 'Новая картинка не выбрана и/или не помечена новой, все осталось как и было ранее'];
            session()->flash('gallery_update', $defaultFlash);
            return redirect()->route('admin.gallery.edit', $gallery->id);
        }


        if ($request->exists('image')){
            // part 1.0 - image. Delete old image && save new image
            $path = $this->getProductImageSavePath($gallery->parent_id);
            $imageFullName = $path . '/' . $gallery->image;
            Storage::disk('public')->delete($imageFullName);

            // todo - код сохранение картинки повторяется, исправить
            $image = request()->file('image')[0];
            //$newImageName = Str::random() . '---' . time() . '.' . $image->extension();
            //$gallery->image = $newImageName;
            //Storage::disk('public')->putFileAs('', $image, $newImageName);

            $saveImage = $this->saveImage($image, $path);
            if (!$saveImage['success']){
                session()->flash('gallery_update', ['success' => false, 'message' => $saveImage['message']]);
                return redirect()->route('admin.gallery.edit', $gallery->id);
            }

            // part 1.1 - image. compress image, create 3 folders with different dimension
            $imgSize = ImageCompression::getImageSize($saveImage['fullName']);
            if (!$imgSize['success']){
                session()->flash('gallery_update', ['success' => false, 'message' => $imgSize['message']]);
                return redirect()->route('admin.gallery.edit', $gallery->id);
            }

            $imageCompress = ImageCompression::convertToWebp($saveImage['fullName'], $imgSize['width'], $imgSize['height']);
            //dd($imageCompress);
        }

        try{
            // part 2 - checkbox is_main
            if ($request->exists('is_main')){
                $this->resetMainImage($gallery->parent_id);
                $gallery->is_main = 1;
            }
            $gallery->image = $saveImage['name'];
            $gallery->save();
        }catch (\Exception $e){
            session()->flash('gallery_update', ['success' => false, 'message' => 'Ошибка при обновлении картинки продукта!']);
            return redirect()->route('admin.gallery.edit', $gallery->id);
        }

        session()->flash('gallery_update', ['success' => true, 'message' => 'Картинка продукта обновлена']);
        return redirect()->route('admin.gallery.edit', $gallery->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        //return $gallery;
        try{
            Storage::disk('public')->delete($gallery->image);
            $gallery->delete();
        }catch (\Exception $e){
            session()->flash('gallery_delete', ['success' => false, 'message' => 'Ошибка при удалении картинки продукта!']);
            return redirect()->route('admin.gallery.index');
        }

        session()->flash('gallery_delete', ['success' => true, 'message' => 'Картинка продукта удалена']);
        return redirect()->route('admin.gallery.index');
    }
}
