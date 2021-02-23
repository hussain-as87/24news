<?php

namespace App\Http\Controllers;


use App\Http\Resources\News as NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class ApiNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::paginate(15);
        return NewsResource::collection($news);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = $request->isMethod('put') ? News::findOrFail($request->id) : new News;
        $news->id = $request->input('id');
        $news->title = $request->input('title');
        $news->summary = $request->input('summary');
        $news->details = $request->input('details');
        $news->classification_id = $request->input('classification_id');
        $news->user_id = $request->input('user_id');
        $news->case = $request->input('case');
        if ($news->save()) {
            return new NewsResource($news);
        }
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
        return new NewsResource($news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        if ($news->delete()) {
            return new NewsResource($news);

        }
    }
}
