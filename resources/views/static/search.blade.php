@extends('layouts.layout')
@section('title','Details About')
@section('content')
    <div class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    @if (isset($details))
                        {{-- <p> The Search results for your query <b> {{ $query }} </b> are :</p>--}}
                        @foreach ($details as $news)
                            <divclass class="row pb-4">
                                <div class="col-md-5">
                                    <div class="fh5co_hover_news_img">
                                        <div class="fh5co_news_img"><img src="{{asset('storage/'.$news->image)}}"
                                                                         alt=""/></div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="col-md-7 animate-box">
                                    <a href="{{$news->publicPath()}}"
                                       class="fh5co_magna py-2"> {{$news->title}}. </a>
                                    <a href="{{$news->publicPath()}}"
                                       class="fh5co_mini_time py-3">
                                        {{$news->user->name}} -
                                        {{$news->created_at}}</a>
                                    <div class="fh5co_consectetur"> {{$news->summary}}.
                                    </div>
                                </div>
                            </divclass>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="row mx-0">
                <div class="col-12 text-center pb-4 pt-4">
                    {{$news->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
