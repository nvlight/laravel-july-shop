<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

    protected function saveSvgIcon(){
        $svgFGC = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
  <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
</svg>';
        $encodedSVG = \rawurlencode(\str_replace(["\r", "\n"], ' ', $svgFGC));
        $encodedSVGDataImage = "data:image/svg+xml;utf8," . $encodedSVG;
        // первый способ - чтобы использовать как backgorund-image: url($encodedSVGDataImage)

        // второй способ, это засунуть его в img
        // <img src="data:image/svg+xml;utf8,<?= $encodedSVG ? >"> // todo - ? > тут пробел лишний, если убрать можно в img засунуть
        return $encodedSVGDataImage;
    }

    /**
     * Сохраняет 1 входящий рисунок в нужную папку с нужным именем
     * @param $source
     * @param $imagePath
     * @param $imageName
     * @return bool
     */
    protected function saveSingleImage($source, $imagePath, $imageName){
        try {
            Storage::disk('public')
                ->putFileAs($imagePath, $source, $imageName);//
            //  ->put($image_name, $image);
        }catch (\Exception $e) {
            // log this
            return false;
        }
        return true;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //dd($request->all());

        $category = new Category();
        $category->fill($request->all());

        //$originalName = $image->getClientOriginalName();

        if ($request->has('image')){
            $image = $request->file('image');
            $imagePath = env('BURGER_MENU_1ST_LEVEL_IMAGES_PATH');
            $imageName = Str::random() . '---' . time() . '.' . $image->extension();
            $imgSaved = $this->saveSingleImage($image, $imagePath, $imageName);
            if ($imgSaved){
                $category->image = $imageName;
            }
        }

        if ($request->has('svg1')) {
            $svg1 = $request->file('svg1');
            $imagePath = env('BURGER_MENU_1ST_LEVEL_SVGS_PATH');
            $imageName = Str::random() . '---' . time() . '.' . $svg1->extension();
            $imgSaved = $this->saveSingleImage($svg1, $imagePath, $imageName);
            if ($imgSaved) {
                $category->svg1 = $imageName;
            }
        }

        if ($request->has('svg2')) {
            $svg2 = $request->file('svg2');
            $imagePath = env('BURGER_MENU_1ST_LEVEL_SVGS_PATH');
            $imageName = Str::random() . '---' . time() . '.' . $svg2->extension();
            $imgSaved = $this->saveSingleImage($svg2, $imagePath, $imageName);
            if ($imgSaved) {
                $category->svg2 = $imageName;
            }
        }

        $category->save();

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

            if ( $request->hasFile('image')) {
                $this->deleteImage($category->image);

                $image = $request->file('image');

                // todo - replace this to single method
                $imagePath = env('BURGER_MENU_1ST_LEVEL_IMAGES_PATH');
                $imageName = Str::random() . '---' . time() . '.' . $image->extension();
                $imgSaved = $this->saveSingleImage($image, $imagePath, $imageName);
                if ($imgSaved){
                    $category->image = $imageName;
                }
            }

            $category->save();
        }catch (\Exception $e){
            session()->flash('category_update', ['success' => false, 'message' => 'Ошибка при обвнолении категории!']);
            return redirect()->route('admin.category.edit', $category->id);
        }

        session()->flash('category_update', ['success' => true, 'message' => 'Категория обновлена']);
        return redirect()->route('admin.category.edit', $category->id);
    }

    /**
     * Удаляет картинку
     * @param $imageName
     * @return bool
     */
    protected function deleteImage($imageName)
    {
        $deleteImage = env('BURGER_MENU_1ST_LEVEL_IMAGES_PATH') . $imageName;
        if (Storage::disk('public')->exists($deleteImage)){
            Storage::disk('public')->delete($deleteImage);
            return true;
        }
        return false;
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
            $this->deleteImage($category->image);
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

    /**
     * Удаляет основную картинку у категории
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyImage(Category $category)
    {
        //dd('ya tut');
        try{
            $isDelete = $this->deleteImage($category->image);
            if (!$isDelete){
                session()->flash('default_message', ['success' => true, 'message' => 'Ошибка при удалении (картинка не найдена)!']);
                return back();
            }
            $category->image = null;
            $category->save();
        }catch (\Exception $e){
            // log
            session()->flash('default_message', ['success' => true, 'message' => 'Ошибка при удалении картинки категории!']);
            return back();
        }

        session()->flash('default_message', ['success' => true, 'message' => 'Основная картинка категории удалена']);
        return back();
    }
}
