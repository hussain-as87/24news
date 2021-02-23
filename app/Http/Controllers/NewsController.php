<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, News $newses)
    {

        $news00 = News::where('case', $request->query('case', 0))->orderBy('id', 'DESC')->paginate(4);
        $news11 = News::where('case', $request->query('case', 1))->orderBy('id', 'DESC')->paginate(1);
        $news0 = News::where('case', $request->query('case', 0))->orderBy('id', 'DESC')->paginate(8);
        $news1 = News::where('case', $request->query('case', 1))->orderBy('id', 'DESC')->paginate(8);
        $news2 = News::orderBy('id', 'DESC')->paginate(8);
        $news = News::orderBy('id', 'DESC')->paginate(1);
        $classifications = Classification::all();
        return view('static.index', compact('news', 'news2', 'classifications', 'news1', 'news0', 'news00', 'news11', 'newses'));
    }

    public function search(Request $request)
    {
        $news0 = News::where('case', $request->query('case', 0))->orderBy('id', 'DESC')->paginate(8);
        $news1 = News::where('case', $request->query('case', 1))->orderBy('id', 'DESC')->paginate(8);
        $classifications = Classification::all();
        $q = $_GET['q'];
        $news = News::where('title', 'LIKE', '%' . $q . '%')->orWhere('summary', 'LIKE', '%' . $q . '%')->paginate(8);
        if (count($news) > 0) {
            return view('static.search', compact('classifications', 'news', 'news0', 'news1'))->withDetails($news)->withQuery($q);
        } else {
            return view('static.search', compact('classifications', 'news', 'news0', 'news1'))->withMessage('No Details found. Try to search again !');
        }

    }

    public function search_from_control(Request $request)
    {
        $c = $_GET['c'];
        $news = News::where('title', 'LIKE', '%' . $c . '%')->orWhere('summary', 'LIKE', '%' . $c . '%')->get();
        if (count($news) > 0) {
            return view('control.news.search', compact('news'))->withDetails($news)->withQuery($c);
        } else {
            return view('control.news.search', compact('news'))->withMessage('No Details found. Try to search again !');
        }

    }

    public function blog(Request $request)
    {
        $news = News::paginate(8);
        $news0 = News::where('case', $request->query('case', 0))->orderBy('id', 'DESC')->paginate(8);
        $news1 = News::where('case', $request->query('case', 1))->orderBy('id', 'DESC')->paginate(8);
        $classifications = Classification::all();

        return view('static.blog', compact('news', 'news0', 'news1', 'classifications'));
    }


    public function blog_show(Request $request, $slug, Classification $classification)
    {
        $newses = News::where('classification_id', $request->query('classification_id', $slug))->paginate(8);
        $news0 = News::where('case', $request->query('case', 0))->orderBy('id', 'DESC')->simplePaginate(8);
        $news1 = News::where('case', $request->query('case', 1))->orderBy('id', 'DESC')->simplePaginate(8);
        $classifications = Classification::all();

        return view('static.blog_show', compact('news0', 'news1', 'classification', 'classifications', 'newses'));
    }


    public function single(Request $request, $slug)
    {
        $news = News::where('id', $slug)->firstOrFail();
        $news0 = News::where('case', $request->query('case', 0))->orderBy('id', 'DESC')->simplePaginate(8);
        $news1 = News::where('case', $request->query('case', 1))->orderBy('id', 'DESC')->simplePaginate(8);
        $classifications = Classification::all();
        return view('static.single', compact('news', 'news1', 'news0', 'classifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(News $news)
    {
        $classifications = Classification::all();
        return view('control.news.add', compact('news', 'classifications'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, News $news)
    {
        $news->load('user.News');
        $news->load('classification.news');
        $data = $this->getValidationFactory();
        $news = auth()->user()->News()->create($data);
        $this->storeImage($news);
        // dd($data);
        return redirect(route('news.create'))->with('message', '');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $news = News::all();
        return view('control.news.show', compact('news'));
    }

    public function details($slug)
    {
        $news = News::where('id', $slug)->firstOrFail();
        return view('control.news.details_show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $classifications = Classification::all();
        return view('control.news.edit', compact('news', 'classifications'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $data = $this->getValidationFactory();

        $news->update($data);

        $this->storeImage($news);
        return redirect(route('news.show'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect(route('news.show'));
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

    private function storeImage(News $news)
    {
        $image = '';
        $image = basename($_FILES["image"]["name"]);

        if (\request()->hasFile('image')) {
            $news->update([
                'image' => \request()->image->store('store/images', 'public'),
            ]);

            // $news->saveImage(\request()->image, 'store/images');

            /*$image=Image::make(public_path('storage/'.$customer->image))->fit(300,300);
        $image->save();*/

        }


    }
}


