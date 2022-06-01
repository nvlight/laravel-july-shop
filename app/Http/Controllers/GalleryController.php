<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function test(Request $request)
    {
        //dump(session()->all());
        dump($request->all());

        if ($request->isMethod('post')){
            //echo "its post <br>";

            $image      = $request->file('image')[0];
            $originalName = $image->getClientOriginalName();
            $newImageName = Str::random() . '---' . time() . '.' . $image->extension();

            //$image->store($image_name);
            //Storage::disk('public')->putFileAs('', $image, $newImageName);// ->put($image_name, $image);

            //return Storage::disk('public')->download($newImageName, $originalName);
        }

        return view('gallery.gallery-test');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();

        return view('gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();

        return view('gallery.create', compact('products'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGalleryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGalleryRequest $request)
    {
        dump($request->all());

        $uploadedFiles = $this->saveUploadImages();
        dump($uploadedFiles);

        // now save to DB all filenames with gallery
        foreach($uploadedFiles['uploaded'] as $file){
            $gallery = new Gallery();
            $gallery->parent_id = $request->parent_id;
            //$tmp['newImageName'] = $newImageName;
            //$tmp['originalName'] = $originalName;
            $gallery->image = $file['newImageName'];
            $gallery->save();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        //
    }
}
