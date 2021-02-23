<!DOCTYPE html>
<!--
	24 News by FreeHTML5.co
	Twitter: https://twitter.com/fh5co
	Facebook: https://fb.com/fh5co
	URL: https://freehtml5.co
-->
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      dir="{{--{{ config('locales.languages')[app()->getLocale()]['rtl_support'] }}--}}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link href="{{asset('css/media_query.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}"
          rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="{{asset('css/owl.carousel.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/owl.theme.default.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap CSS -->
    <link href="{{asset('css/style_1.css')}}" rel="stylesheet" type="text/css"/>
<!--    {{--@if (config('locales.languages')[app()->getLocale()]['rtl_support'] == 'rtl')--}}
    <link rel="stylesheet" href="{{--{{ asset('frontend/css/bootstrap-rtl.css') }}--}}">
{{--
@endif
--}}
    <!-- Modernizr JS -->
    <script src="{{asset('js/modernizr-3.5.0.min.js')}}"></script>
    <style>
        .page-link {

            background: #f1f1f1 !important;
            color: #222;
            padding: 12px 20px !important;
            font-weight: 800;
            margin: 0 10px;
            -moz-transition: all .5s ease;
            -o-transition: all .5s ease;
            -webkit-transition: all .5s ease;
            -ms-transition: all .5s ease;
            transition: all .5s ease;
        }
    </style>
</head>
<body>
<div class="container-fluid fh5co_header_bg">
    <div class="container">
        <div class="row">
            <div class="col-12 fh5co_mediya_center"><a href="#" class="color_fff fh5co_mediya_setting"><i
                        class="fa fa-clock-o"></i>&nbsp;&nbsp;&nbsp;<?php  Carbon\Carbon::now();
                    echo date('D-M-Y h:i:s');
                    ?></a>
                <div class="d-inline-block fh5co_trading_posotion_relative"><a href="#"
                                                                               class="treding_btn">{{__('Trending')}}</a>
                    <div class="fh5co_treding_position_absolute"></div>
                </div>
                <a href="#"
                   class="color_fff fh5co_mediya_setting">{{__('Instagram’s big redesign goes live with black-and-white app')}}</a>
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 fh5co_padding_menu">
                <img src="images/logo.png" alt="img" class="fh5co_logo_width"/>
            </div>
            <div class="col-12 col-md-9 align-self-center fh5co_mediya_right">
                <div class="text-center d-inline-block">

                </div>
                <div class="text-center d-inline-block">
                    <a class="fh5co_display_table" href="https://www.linkedin.com/in/huusein-sim-071aa31ba/">
                        <div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div>
                    </a>
                </div>
                <div class="text-center d-inline-block">
                    <a class="fh5co_display_table"
                       href="https://accounts.google.com/SignOutOptions?hl=en&continue=https://mail.google.com/mail&service=mail">
                        <div class="fh5co_verticle_middle"><i class="fa fa-google-plus"></i></div>
                    </a>
                </div>
                <div class="text-center d-inline-block">
                    <a href="https://twitter.com/SimHussein" target="_blank" class="fh5co_display_table">
                        <div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div>
                    </a>
                </div>
                <div class="text-center d-inline-block">
                    <a href="https://www.facebook.com/hussein.sim.37" target="_blank" class="fh5co_display_table">
                        <div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div>
                    </a>
                </div>

                <!-- Right Side Of Navbar -->
                <ul class="d-inline-block text-center dd_position_relative ">
                    <li class="form-control fh5co_text_select_option">

                        <a href="#" class="nav-link dropdown-toggle" id="languagesDropdown" data-toggle="dropdown"
                           role="button" aria-expanded="false" aria-haspopup="true">
                            {{ __(config('locales.languages')[app()->getLocale()]['name']) }} <span
                                class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="languagesDropdown">
                            @foreach(config('locales.languages') as $key => $val)
                                @if ($key != app()->getLocale())
                                    <a href="{{ route('change.language', __($key)) }}"
                                       class="dropdown-item">{{ __($val['name'] )}}</a>
                                @endif
                            @endforeach
                        </div>

                    </li>
                </ul>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
    <div class="container padding_786">
        <nav class="navbar navbar-toggleable-md navbar-light ">
            <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
            <a class="navbar-brand" href="#"><img src="images/logo.png" alt="img" class="mobile_logo_width"/></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link fh5co_verticle_middle" href="{{route('home')}}">{{__('Home')}}<span
                                class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item  fh5co_verticle_middle">
                        <a class="nav-link" href="{{route('blog')}}">{{__('blog')}} <span
                                class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown fh5co_verticle_middle">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton2" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">{{__('world')}} <span
                                class="sr-only">(current)</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                            <a class="dropdown-item" href="#">Action in</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown fh5co_verticle_middle ">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton3" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">{{__('community')}}<span
                                class="sr-only">(current)</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                            <a class="dropdown-item" href="#">Action in</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link fh5co_verticle_middle" href="{{route('contact')}}">{{__('contact')}} <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton3" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">{{__('user')}}<span
                                class="sr-only">(current)</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></div>
                    </li>
                    <li>
                        <div>
                            <form class="form-inline my-2 my-lg-0" action="{{route('search')}}">
                                @csrf
                                <input class="form-control mr-sm-2" type="search"
                                       placeholder="{{__('enter what you needed')}}"
                                       aria-label="Search" name="q">
                                <button class="btn btn-outline-light my-2 my-sm-0 fa fa-search" type="submit"></button>
                            </form>
                        </div>
                    </li>


                </ul>
            </div>
        </nav>
    </div>
</div>

@yield('content')


<div class="container-fluid fh5co_footer_bg pb-3">
    <div class="container animate-box">
        <div class="row">
            <div class="col-12 spdp_right py-5"><img src="images/white_logo.png" alt="img" class="footer_logo"/></div>
            <div class="clearfix"></div>
            <div class="col-12 col-md-4 col-lg-3">
                <div class="footer_main_title py-3"> {{__('About')}}</div>
                <div class="footer_sub_about pb-3">{{__('about content')}}
                </div>
                <div class="footer_mediya_icon">
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer"
                                                               href="https://www.linkedin.com/in/huusein-sim-071aa31ba/">
                            <div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div>
                        </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer"
                                                               href="https://accounts.google.com/SignOutOptions?hl=en&continue=https://mail.google.com/mail&service=mail">
                            <div class="fh5co_verticle_middle"><i class="fa fa-google-plus"></i></div>
                        </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer"
                                                               href="https://twitter.com/SimHussein">
                            <div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div>
                        </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer"
                                                               href="https://www.facebook.com/hussein.sim.37">
                            <div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div>
                        </a></div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-2">
                <div class="footer_main_title py-3"> {{__('Category')}}</div>
                <ul class="footer_menu">
                    @foreach($classifications as $class)
                        <li><a href="{{url('blog-'.$class->id)}}" class=""><i
                                    class="fa fa-angle-right"></i>&nbsp;&nbsp; {{$class->name}}</a></li>
                    @endforeach

                </ul>
            </div>
            <div class="col-12 col-md-5 col-lg-3 position_footer_relative">
                <div class="footer_main_title py-3">{{__('Most Viewed')}}</div>
                @foreach($news1 as $n)
                    <div class="footer_makes_sub_font">{{$n->created_at->format('D-M-Y')}}<br/>
                        {{$n->created_at->format('h:i:s')}}</div>
                    <a href="{{$n->publicPath()}}" class="footer_post pb-4"> {{$n->title}}</a>
                @endforeach

                <div class="footer_position_absolute"><img src="images/footer_sub_tipik.png" alt="img"
                                                           class="width_footer_sub_img"/></div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 ">
                <div class="footer_main_title py-3">{{__('Last Modified')}}</div>
                @foreach($news1 as $n)
                    <a href="{{$n->publicPath()}}" class="footer_img_post_6"><img
                            src="{{asset('storage/'.$n->image)}}" alt="img"/></a>
                @endforeach
            </div>
        </div>
        <!--        <div class="row justify-content-center pt-2 pb-4">
                    <div class="col-12 col-md-8 col-lg-7 ">
                        <div class="input-group">
                            <span class="input-group-addon fh5co_footer_text_box" id="basic-addon1"><i
                                    class="fa fa-envelope"></i></span>
                            <input type="text" class="form-control fh5co_footer_text_box" placeholder="Enter your email..."
                                   aria-describedby="basic-addon1">
                            <a href="#" class="input-group-addon fh5co_footer_subcribe" id="basic-addon12"> <i
                                    class="fa fa-paper-plane-o"></i>&nbsp;&nbsp;Subscribe</a>
                        </div>
                    </div>
                </div>
            </div>-->
    </div>
    <div class="container-fluid fh5co_footer_right_reserved">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 py-4 Reserved"> ©{{__('Copyright')}} <a
                        href="https://freehtml5.co" title="Free HTML5 Bootstrap templates">FreeHTML5.co</a>.
                </div>
                <div class="col-12 col-md-6 spdp_right py-4">
                    <a href="{{route('home')}}" class="footer_last_part_menu">{{__('Home')}}</a>
                    <a href="{{route('contact')}}" class="footer_last_part_menu">{{__('About')}}</a>
                    <a href="{{route('contact')}}" class="footer_last_part_menu">{{__('contact')}}</a>
                    <a href="{{route('blog')}}" class="footer_last_part_menu">{{__('Latest News')}}</a></div>
            </div>
        </div>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
            integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
            integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
            crossorigin="anonymous"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Main -->
    <script src="js/main.js"></script>
</div>
</body>
</html>
