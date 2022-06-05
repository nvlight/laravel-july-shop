<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    protected $maxImgsCountForProduct;

    public function __construct()
    {
        $this->maxImgsCountForProduct = env('PRODUCT_MAX_IMGS_COUNT', 5);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();

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
     *
     */
    protected function saveUploadImages()
    {
        if (! \request()->exists('image')){
            $result = ['success' => false, 'message' => 'there is no image in request!'];
            return $result;
        }

        $uploadedImages = [];
        $images = request()->file('image');

        $result = ['success' => true, 'message' => 'all files uploaded!'];

        foreach($images as $image) {
            $originalName = $image->getClientOriginalName();
            $newImageName = Str::random() . '---' . time() . '.' . $image->extension();
            try {
                //$image->store($image_name);
                Storage::disk('public')->putFileAs('', $image, $newImageName);// ->put($image_name, $image);
                $tmp = [];
                $tmp['newImageName'] = $newImageName;
                $tmp['originalName'] = $originalName;
                $uploadedImages[] = $tmp;
            } catch (\Exception $e) {
                $result = ['success' => false, 'message' => 'file upload is failed!'];
                return $result;
            }
        }

        $result['uploaded'] = $uploadedImages;

        return $result;

        // for download file
        //return Storage::disk('public')->download($newImageName, $originalName);
    }

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

    protected function productImagesCountByColumnAndValue($column, $equal)
    {
        return Gallery::where($column, $equal)->count();
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
            return redirect()->route('gallery.index');
        }

        // todo - сохранение картинки и записи в бд нужно отрефакторить, обе действия делать не по отдельности
        // todo   а в цикле и также в цикле перехватывать ошибки
        $uploadedFiles = $this->saveUploadImages();

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
     *
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

        try{
            // part 1 - image. Delete old image && save new image
            if ($request->exists('image')){
                Storage::disk('public')->delete($gallery->image);

                // todo - код сохранение картинки повторяется, исправить
                $image = request()->file('image')[0];
                $newImageName = Str::random() . '---' . time() . '.' . $image->extension();
                $gallery->image = $newImageName;
                Storage::disk('public')->putFileAs('', $image, $newImageName);
            }

            // part 2 - checkbox is_main
            if ($request->exists('is_main')){
                $this->resetMainImage($gallery->parent_id);
                $gallery->is_main = 1;
            }

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
