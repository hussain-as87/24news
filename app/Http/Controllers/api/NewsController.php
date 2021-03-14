<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use UploadImage;

class NewsController extends Controller
{
    protected $path_image = 'public/photos/api/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::with('classification')->Paginate(8);
        return $news;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->getValidationFactory();
        $news = News::create($request->all());
        if ($request->hasFile('image')) {
            $image = self::upload_image($request->image, $this->path_image);
            $news->image = $image;
            $news->save();
        }
        return $news;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        if ($news) {
            return $news;
        } else {
            abort(403, 'not allowed');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->getValidationFactory();
        $news = News::find($id);
        $news->update($request->all());
        if ($request->hasFile('image')) {
            $image = self::upload_image($request->image, $this->path_image);
            $news->image = $image;
            $news->save();
        }
        return $news;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return 'deleted Successfully!';
    }

    protected function getValidationFactory()
    {
        return request()->validate([
            'title.*' => 'required|max:500',
            'summary.*' => 'required|max:1000',
            'details.*' => 'required|max:1000000',
            'classification_id' => 'required',
            'case' => 'required',
            'image' => 'sometimes|file|image|max:20000',
            'video' => 'sometimes',
        ]);
    }

    public static function upload_image($photo, $path)
    {
        $extension = $photo->getClientOriginalExtension();
        $image_name = time() . '.' . $extension;
        $photo->storeAs($path, $image_name);
        return $image_name;
    }

}
