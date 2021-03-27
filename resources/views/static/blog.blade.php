@extends('layouts.layout')
@section('title','Blog')
@section('content')
    <div class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">{{__('news')}}</div>
                    </div>
                    @foreach ($news as $n)
                        <div class="row pb-4">
                            <div class="col-md-5">
                                <div class="fh5co_hover_news_img">
                                    <div class="fh5co_news_img"><img src="{{asset('/storage/photos/web/'.$n->image)}}"
                                                                     alt=""/></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="col-md-7 animate-box">
                                <a href="{{$n->publicPath()}}" class="fh5co_magna py-2"> {{$n->title}}. </a>
                                <a href="{{$n->publicPath()}}"
                                   class="fh5co_mini_time py-3">
                                    {{$n->user->name}} -
                                    {{$n->created_at}}</a>
                                <div class="fh5co_consectetur"> {{$n->summary}}.
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">{{__('Tags')}}</div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="fh5co_tags_all">
                        @foreach($classifications as $class)
                            <a href="{{url('blog-'.$class->id)}}" class="fh5co_tagg">{{$class->name}}</a>
                        @endforeach

                    </div>
                    <div>
                        <div
                            class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">{{__('Popular')}}</div>
                    </div>
                    @foreach ($news1 as $n)
                        <div class="row pb-3">
                            <div class="col-5 align-self-center">
                                <img src="{{asset('/storage/photos/web/'.$n->image)}}" alt="img" class="fh5co_most_trading"/>
                            </div>
                            <div class="col-7 paddding">
                                <div class="most_fh5co_treding_font">{{$n->title}}.</div>
                                <div class="most_fh5co_treding_font_123"> {{$n->created_at}}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row mx-0">
                <div class="col-12 text-center pb-4 pt-4">
                    {{$news->links()}}
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pb-4 pt-5">
        <div class="container animate-box">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">{{__('Trending')}}</div>
            </div>
            <div class="owl-carousel owl-theme" id="slider2">
                @foreach($news0 as $n)
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="{{asset('/storage/photos/web/'.$n->image)}}" alt=""/></div>
                            <div>
                                <a href="#" class="d-block fh5co_small_post_heading"><span
                                        class="">{{$n->title}}.</span></a>
                                <div class="c_g"><i class="fa fa-clock-o"></i> {{$n->created_at}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
