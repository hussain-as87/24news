@extends('layouts.layout')
@section('title','24News')
@section('content')
    <div class="container-fluid paddding mb-5 d-inline">
        <div class="row mx-0">
            @foreach($news11 as $n)
                <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
                    <div class="fh5co_suceefh5co_height"><img src="{{asset('storage/'.$n->image)}}" alt="img"/>
                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                        <div class="fh5co_suceefh5co_height_position_absolute_font">
                            <div class=""><a href="{{$n->publicPath()}}" class="color_fff"> <i
                                        class="fa fa-clock-o"></i>&nbsp;{{$n->created_at->format('D-M-Y')}}<br/>
                                    {{$n->created_at->format('h:i:s')}}
                                </a></div>
                            <div class=""><a href="{{$n->publicPath()}}"
                                             class="fh5co_good_font">{{$n->title}}, more is said than done </a></div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-6">
                <div class="row">
                    @foreach($news00 as $n)
                        <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                            <div class="fh5co_suceefh5co_height_2"><img src="{{asset('storage/'.$n->image)}}"
                                                                        alt="img"/>
                                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                                <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                    <div class=""><a href="{{$n->publicPath()}}" class="color_fff"> <i
                                                class="fa fa-clock-o"></i>&nbsp;&nbsp;{{$n->created_at->format('D-M-Y')}}
                                            <br/>
                                            {{$n->created_at->format('h:i:s')}}  </a></div>
                                    <div class=""><a href="{{$n->publicPath()}}"
                                                     class="fh5co_good_font_2"> {{$n->title}}, <br>more is said than
                                            done </a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>

    <div class="container-fluid pt-3">
        <div class="container animate-box" data-animate-effect="fadeIn">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">{{__('Trending')}}</div>
            </div>
            <div class="owl-carousel owl-theme js" id="slider1">
                @foreach($news0 as $n)
                    <div class="item px-2">
                        <div class="fh5co_latest_trading_img_position_relative">
                            <div class="fh5co_latest_trading_img"><img src="{{asset('storage/'.$n->image)}}"
                                                                       alt=""
                                                                       class="fh5co_img_special_relative"/>
                            </div>
                            <div class="fh5co_latest_trading_img_position_absolute"></div>
                            <div class="fh5co_latest_trading_img_position_absolute_1">
                                <a href="{{$n->publicPath()}}" class="text-white"> {{$n->title}} </a>
                                <div
                                    class="fh5co_latest_trading_date_and_name_color">{{$n->created_at->format('D-M-Y')}}
                                    <br/>
                                    {{$n->created_at->format('h:i:s')}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container-fluid pb-4 pt-5">
        <div class="container animate-box">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">{{__('news')}}</div>
            </div>
            <div class="owl-carousel owl-theme" id="slider2">
                @foreach ($news as $n)
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="{{asset('storage/'.$n->image)}}" alt=""/></div>
                            <div>
                                <a href="{{$n->publicPath()}}"
                                   class="d-block fh5co_small_post_heading"><span
                                        class="">{{$n->title}}</span></a>
                                <div class="c_g"><i class="fa fa-clock-o"></i>{{$n->created_at->format('D-M-Y')}}<br/>
                                    {{$n->created_at->format('h:i:s')}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    @if ($newses->video)
        <div class="container-fluid fh5co_video_news_bg pb-4">
            <div class="container animate-box" data-animate-effect="fadeIn">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-5 pb-2 mb-4  text-white">Video
                        {{__('news')}}
                    </div>
                </div>
                <div>
                    <div class="owl-carousel owl-theme" id="slider3">
                        @foreach ($news as $n)
                            @if ($n->video)
                                <div class="item px-2">
                                    <div class="fh5co_hover_news_img">
                                        <div class="fh5co_hover_news_img_video_tag_position_relative">
                                            <div class="fh5co_news_img">
                                                <div style="width: 100%;height: 200px"> {!! $n->video_html !!}</div>

                                            </div>
                                            <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide_2">
                                                <img src="{{asset('storage/'.$n->image)}}" alt=""/></div>
                                            <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide_2"
                                                 id="play-video_2">
                                                <div
                                                    class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                                    <div
                                                        class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                                        <span><i class="fa fa-play"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pt-2">
                                            <a href="{{$n->publicPath()}}"
                                               class="d-block fh5co_small_post_heading ">
                                                <span class="">{{$n->title}}</span></a>
                                            <div class="c_g"><i
                                                    class="fa fa-clock-o"></i> {{$n->created_at->format('D-M-Y')}}
                                                <br/>
                                                {{$n->created_at->format('h:i:s')}}</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">{{__('news')}}</div>
                    </div>
                    @foreach($news2 as $n)
                        <div class="row pb-4">
                            <div class="col-md-5">
                                <div class="fh5co_hover_news_img">
                                    <div class="fh5co_news_img"><img src="{{asset('storage/'.$n->image)}}"
                                                                     alt=""/></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="col-md-7 animate-box">
                                <a href="{{$n->publicPath()}}" class="fh5co_magna py-2"> {{$n->title}}.<br/>
                                </a>
                                <a href="{{$n->publicPath()}}"
                                   class="fh5co_mini_time py-3">
                                    {{$n->user->name}} -
                                    {{$n->created_at->format('D-M-Y')}}<br/>
                                    {{$n->created_at->format('h:i:s')}}</a>
                                <div class="fh5co_consectetur"> {!!$n->summary!!}.
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
                        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">{{__('Popular')}}
                        </div>
                    </div>
                    @foreach($news1 as $n)

                        <div class="row pb-3">
                            <div class="col-5 align-self-center">
                                <a href="{{$n->publicPath()}}"><img src="{{asset('storage/'.$n->image)}}"
                                                                    alt="img"
                                                                    class="fh5co_most_trading"/></a>

                            </div>
                            <div class="col-7 paddding">
                                <a href="{{$n->publicPath()}}">
                                    <div class="most_fh5co_treding_font"> {{$n->title}}.
                                    </div>
                                </a>

                                <div class="most_fh5co_treding_font_123"> {{$n->created_at->format('D-M-Y')}}<br/>
                                    {{$n->created_at->format('h:i:s')}} </div>
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

@endsection
