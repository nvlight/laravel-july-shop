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
     * Получить рендомное имя для картинки с добавленнием суффикса "-$number"
     * @param string $number
     * @return string
     */
    public function getRandomImageNameWithNumber(string $number = '1')
    {
        $baseName = Str::random() . '___' . time() . '-' . $number;
        return $baseName;
    }

    /**
     * Сохранить картинку с номером и путем
     * @param $srcImage
     * @param $distImgPath
     * @param $distImgName
     * @return array
     */
    protected function saveImage($srcImage, $distImgPath='', $distImgName)
    {
        try {
            // ->put($image_name, $image);
            Storage::disk('public')->putFileAs($distImgPath, $srcImage, $distImgName);

            $result['success'] = true;
            $result['message'] = 'file upload is success!';
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
     * Получить часть пути сохранения пресетов картинки вместе с ИД продукта.
     * @param int $productId
     * @return string
     */
    protected function getProductImageSavePresetPathPart(int $productId)
    {
        $path = config('product.gallery.paths.products_show_path');
        $path .= '/' . $productId . '/';

        return $path;
    }

    /**
     * Получить путь изображения для удаления пресетов картинки
     * @param int $productId
     * @return string
     */
    protected function getProductImageDeletePathPart(int $productId)
    {
        $path = config('product.gallery.paths.products_path');
        $path .= '/' . $productId . '/';

        return $path;
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
     * Обработчик проверки на превышение лимита картинок на один продукт.
     * @param $request
     * @return bool[]|false[]
     */
    protected function isProductHaveMaxImageCountHandler($request)
    {
        $diffProductImages = $this->isProductHaveMaxImageCount($request->parent_id, count($request->image));
        if ( !($diffProductImages['success']) ){
            session()->flash('default_message', [
                'success' => false,
                'message' => "Максимальное количество изображений для одного продукта = {$this->maxImgsCountForProduct}, " .
                    " превышение составило {$diffProductImages['diff']} картинок",
            ]);
            return false;
        }
        return true;
    }

    /**
     * Создать новую запись с картинкой
     * @param $gallery
     * @return bool
     */
    protected function saveImageQueryHandler($gallery)
    {
        try{
            $gallery->save();
        }catch (\Exception $e) {
            $result = [
                'success' => false,
                'message' => 'Ошибка при обновлении картинки (изменение имени) продукта!'
            ];
            session()->flash('gallery_update', $result);
            return false;
        }
        return true;
    }

    /**
     * Обновить поле is_main - является картинка главной.
     * @param $gallery
     * @param $request
     * @param $i
     * @return mixed
     */
    protected function updateIsMainForProduct($gallery, $request, $i)
    {
        // todo: эта штука не сработает! нужно ввести поле Number - 1,2,3,4,5 найти по номеру нужный и сделать активным
        if ( !Gallery::where('parent_id', $gallery->parent_id)->count())
        {
            if (is_null($request->is_main)){
                $isMain = 1;
            }else{
                $tmp = intval($request->is_main);
                if ($tmp >= 1 && $tmp <= count($request->file('image')) ){
                    $isMain = $tmp;
                }else{
                    $isMain = 1;
                }
            }

            if ($i == $isMain){
                $gallery->is_main = 1;
            }
        }
        return $gallery;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGalleryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGalleryRequest $request)
    {


        if ( !$this->isProductHaveMaxImageCountHandler($request)){
            return redirect()->route('admin.gallery.index');
        }

        $i = 1;
        foreach($request->file('image') as $image)
        {
            $gallery = new Gallery();
            $gallery->parent_id = $request->parent_id;

            $img = [];
            $img['baseName']  = $this->getRandomImageNameWithNumber($i);
            $img['extension'] = $image->extension();
            $img['name']      = $img['baseName'] . '.' . $img['extension'];
            $img['savePath']  = $this->getProductImageSavePath($gallery->parent_id);
            $img['fullName']  = $img['savePath'] . '/' . $img['name'];

            $gallery->image = $img['fullName'];

            $gallery = $this->updateIsMainForProduct($gallery, $request, $i);

            if ( !$this->saveImageQueryHandler($gallery)){
                return redirect()->route('admin.gallery.edit', $gallery->id);
            }

            // todo - код сохранение картинки повторяется, исправить
            $saveOrigImage = $this->saveImage($image, $img['savePath'], $img['name']);
            if (!$saveOrigImage['success']){
                session()->flash('gallery_update', ['success' => false, 'message' => $saveOrigImage['message']]);
                return redirect()->route('admin.gallery.edit', $gallery->id);
            }

            // compress/resize/save with presets
            $compressAndResizeImgsPresets = $this->compressAndResizeImagesWithThreePreset($img, $gallery->parent_id);
            if (!$compressAndResizeImgsPresets['success']){
                session()->flash('gallery_update', ['success' => false, 'message' => $compressAndResizeImgsPresets['message']]);
                return redirect()->route('admin.gallery.edit', $gallery->id);
            }

            $i++;
        }

        session()->flash('gallery_images_created', ['success' => true, 'message' => 'Картинки продукта сохранены!']);
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
     * Удаление файла
     * @param string $file
     * @return array
     */
    protected function deleteFile(string $file)
    {
        try{
            Storage::disk('public')->delete($file);
        }catch (\Exception $e){
            return ['success' => false, 'message' => 'Ошибка при удалении!'];
        }
        return ['success' => true, 'message' => 'Файл удален'];
    }

    /**
     * Удаление всех пресетов выбранной картинки
     * @param string $path
     * @param string $image
     * @return array
     */
    protected function deleteImagePresets($gallery)
    {
        $imgPathPartsArr = explode('/', $gallery->image);
        $imgName = $imgPathPartsArr[count($imgPathPartsArr)-1];

        $image = $imgName . '.webp';

        $imgDeletePath = $this->getProductImageDeletePathPart($gallery->parent_id);

        $convertPresets = config('product.gallery.convert_presets');
        foreach ($convertPresets as $preset => $value)
        {
            $fileName = $imgDeletePath . '/' . $preset . '/' . $image;
            $tryDelete = $this->deleteFile($fileName);

            if ( !$tryDelete['success']){
                return [
                    'success' => false,
                    'message' => $tryDelete['message'] . ' - fileName: ' . $fileName
                ];
            }
        }
        return ['success' => true, 'message' => 'Весь пресет картинки удален'];
    }

    /**
     * Тестирование функции сжатия файла и создания 3-х пресетов
     * @return void
     */
    public function test_compress_image()
    {
        $staticImg   = "J7qEjtnIdtfmPeHH___1658509034-1.jpg";
        $pathPart    = config('product.gallery.paths.products_show_path') . '/19/';
        $fullImgPath = $pathPart . config('product.gallery.paths.orig_path') . '/' . $staticImg;

        $imgPresets = config('product.gallery.convert_presets');
        $imgPresetsPath = [];
        foreach($imgPresets as $key => $value){
            $newDir = $pathPart . $key;
            $convFullImgPath = $newDir . '/' . $staticImg;

            //mkdir($newDir, 0777, true);
            if (!is_dir($newDir)){
                mkdir($newDir);
            }

            $imageCompress = ImageCompression::convertToWebp($fullImgPath, $convFullImgPath, $value['width'], $value['height']);
            //dump($imageCompress);
            $imgPresetsPath[$key] = [
                'src' => $imageCompress['image'],
                'width' => $value['width'],
                'height' => $value['height'],
            ];
        }

//        $compressAndResizeImgsPresets = $this->compressAndResizeImagesWithThreePreset($img, $gallery->parent_id);
//            if (!$compressAndResizeImgsPresets['success']){
//                session()->flash('gallery_update', ['success' => false, 'message' => $compressAndResizeImgsPresets['message']]);
//                return redirect()->route('admin.gallery.edit', $gallery->id);
//            }

        return view('admin.gallery.test.test_compress_image',
                compact('fullImgPath',  'imgPresetsPath'));
    }

    /**
     * Преобразование картинки в webP, изменение размеров и сохранение с разными пресетами в разных папках
     * @param string $path
     * @param string $image
     * @return array
     */
    protected function compressAndResizeImagesWithThreePreset(array $image, int $parentId)
    {
        $imgSavePath = $this->getProductImageSavePresetPathPart($parentId);
        $imgPresets = config('product.gallery.convert_presets');
        $imgPresetsPath = [];

        foreach($imgPresets as $preset => $value)
        {
            $newDir          = $imgSavePath . $preset;
            if (!is_dir($newDir)){
                mkdir($newDir); // ! нужно создать эту папку, иначе imagewebp выдает ошибку !
            }

            $convFullImgName = $newDir . '/' . $image['name'];
            $convFullImgNameWithWebpExtension =  $convFullImgName . '.webp';

            $imageCompress = ImageCompression::convertToWebp(
                'storage/' . $image['fullName'],
                $convFullImgNameWithWebpExtension,
                $value['width'],
                $value['height']
            );

            if ( !$imageCompress['success']){
                return [
                    'success' => false,
                    'message' => 'Ошибка при преобразовании пресетов. ' . $imageCompress['message'] ];
            }

            $imgPresetsPath[$preset] = [
                'src'    => $imageCompress['image'],
                'width'  => $value['width'],
                'height' => $value['height'],
            ];

        }
        return ['success' => true, 'message' => 'Картинки преобразованы в webP, изменены размеры и занесены в нужные папки'];
    }

    /**
     * Сохранение оригинальной картинки в папку orig
     * @param string $image
     * @param int $productId
     * @return array
     */
    protected function saveOrigImage($image, int $productId)
    {
        $path = $this->getProductImageSavePath($productId);
        $saveImage = $this->saveImage($image, $path);

        return $saveImage;
    }

    /**
     * Update the specified resource in storage.
     * @param  \App\Http\Requests\UpdateGalleryRequest  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        if ( !$request->exists('is_main') && !$request->exists('image')){
            $defaultFlash = ['success' => true, 'message' => 'Новая картинка не выбрана и/или не помечена новой, все осталось как и было ранее'];
            session()->flash('gallery_update', $defaultFlash);
            return redirect()->route('admin.gallery.edit', $gallery->id);
        }

        if ($request->exists('image'))
        {
            // удалим сначала сам рисунок и его пресеты-рисунки.
            $this->deleteFile($gallery->image);
            $this->deleteImagePresets($gallery);

            // тут фактически повторяется код из метода store
            $image = request()->file('image')[0];
            $img = [];
            $img['baseName']  = $this->getRandomImageNameWithNumber(1);
            $img['extension'] = $image->extension();
            $img['name']      = $img['baseName'] . '.' . $img['extension'];
            $img['savePath']  = $this->getProductImageSavePath($gallery->parent_id);
            $img['fullName']  = $img['savePath'] . '/' . $img['name'];

            $gallery->image = $img['fullName'];

            try{
                $gallery->save();
            }catch (\Exception $e) {
                $result = [
                    'success' => false,
                    'message' => 'Ошибка при обновлении картинки (изменение имени) продукта!'
                ];
                session()->flash('gallery_update', $result);
                return redirect()->route('admin.gallery.edit', $gallery->id);
            }

            // todo - код сохранение картинки повторяется, исправить
            $saveOrigImage = $this->saveImage($image, $img['savePath'], $img['name']);
            if (!$saveOrigImage['success']){
                session()->flash('gallery_update', ['success' => false, 'message' => $saveOrigImage['message']]);
                return redirect()->route('admin.gallery.edit', $gallery->id);
            }

            // compress/resize/save with presets
            $compressAndResizeImgsPresets = $this->compressAndResizeImagesWithThreePreset($img, $gallery->parent_id);
            if (!$compressAndResizeImgsPresets['success']){
                session()->flash('gallery_update', ['success' => false, 'message' => $compressAndResizeImgsPresets['message']]);
                return redirect()->route('admin.gallery.edit', $gallery->id);
            }

        }

        if ($request->exists('is_main'))
        {
            // todo: сделать ли эту картинку главной? пока в представлении нет кнопки, позже сделать
//        try{
//            if ($request->exists('is_main')){
//                $this->resetMainImage($gallery->parent_id);
//                $gallery->is_main = 1;
//                $gallery->save();
//            }
//        }catch (\Exception $e){
//            session()->flash('gallery_update', ['success' => false, 'message' => 'Ошибка при обновлении картинки продукта!']);
//            return redirect()->route('admin.gallery.edit', $gallery->id);
//        }
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
        // todo: add try/catch
        $this->deleteFile($gallery->image);
        $this->deleteImagePresets($gallery);
        $gallery->delete();

        session()->flash('gallery_delete', ['success' => true, 'message' => 'Картинка продукта удалена']);
        return redirect()->route('admin.gallery.index');
    }
}
