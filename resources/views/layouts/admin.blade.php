<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <script src="https://cdn.tiny.cloud/1/vjz0qth6lclm1fvsjz25y5ypdi50fa6q533e24w0yutwwm17/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.tiny.cloud/1/hnpkgwiljc4omujq43dhfyxmlu7sndzhk5bg15qpvkn3287h/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    @if (config('locales.languages')[app()->getLocale()]['rtl_support'] == 'rtl')
        <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-rtl.css') }}">
    @endif
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet"/>

    <style>
        .ltr {
        @import "../node_modules/bootstrap/scss/bootstrap";
        }

        .d3 {
            background-color: #eee;
            width: 200px;
            height: 100px;
            border: 1px dotted black;
            overflow-x: hidden;
            overflow-y: scroll;
        }

        .footer22 {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: silver;
            color: white;
            text-align: center;
        }
    </style>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
          crossorigin="anonymous"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
            crossorigin="anonymous"></script>

</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('news.show')}}">{{__('Admin Control')}}</a>
    <!--    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i>
        </button>-->
    <!-- Navbar Search-->

    <!-- Navbar-->
    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">

            <a href="#" class="nav-link dropdown-toggle" id="languagesDropdown" data-toggle="dropdown" role="button"
               aria-expanded="false" aria-haspopup="true">
                {{ __(config('locales.languages')[app()->getLocale()]['name']) }} <span class="caret"></span>
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

    <form class="form-inline my-2 my-lg-0" action="{{route('news.search')}}">
        @csrf
        <input class="form-control mr-sm-2" type="search" placeholder="{{__('enter what you needed')}}"
               aria-label="Search" name="c">
        <button class="btn btn-outline-light my-2 my-sm-0 " type="submit">{{__('search')}}</button>
    </form>
    <!-- Authentication Links -->
    <!-- Authentication Links -->

</nav>
<div id="layoutSidenav" class="align-self-auto">
    <div id="layoutSidenav_nav" style="width: 15%">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">{{__('Core')}}</div>
                    <a class="nav-link" href="{{route('home')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        {{__('24news')}}
                    </a>

                    <!--                    <div class="sb-sidenav-menu-heading">Interface</div>
                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                            Layouts
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                            </nav>
                                        </div>-->
                    <div class="sb-sidenav-menu-heading">{{__('Pages')}}</div>
                    <a class="nav-link collapsed" href="{{route('class.create')}}">
                        {{__('Add Classifications')}}
                    </a>
                    <a class="nav-link collapsed" href="{{route('news.create')}}">
                        {{__('Add News')}}
                    </a>
                    <a class="nav-link collapsed" href="{{route('class.show')}}">
                        {{__('Show Classifications')}}
                    </a>
                    <a class="nav-link collapsed" href="{{route('news.show')}}">
                        {{__('Show News')}}
                    </a>
                    <a class="nav-link collapsed" href="{{route('contact.show')}}">
                        {{__('Show Contact')}}
                    </a>


                    <!--                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                                    Error
                                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                </a>
                                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                                    <nav class="sb-sidenav-menu-nested nav">
                                                        <a class="nav-link" href="401.html">401 Page</a>
                                                        <a class="nav-link" href="404.html">404 Page</a>
                                                        <a class="nav-link" href="500.html">500 Page</a>
                                                    </nav>
                                                </div>-->

                </div>
                <!--                    <div class="sb-sidenav-menu-heading">Addons</div>
                                    <a class="nav-link" href="charts.html">
                                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                        Charts
                                    </a>
                                    <a class="nav-link" href="tables.html">
                                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                        Tables
                                    </a>-->
                <div class="sb-sidenav-footer footer22 ">
                    <dl>  @guest
                            @if (Route::has('login'))
                                <dt class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </dt>
                            @endif

                            @if (Route::has('register'))
                                <dt class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </dt>
                            @endif
                        @else
                            <dt class="nav-item dropdown">
                                <img src="{{ asset('users/profile_image/'.Auth::user()->avatar)}}" width="50px">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </dt>
                        @endguest</dl>

                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content" class="py-4 w-75">
        <main>
            <div class="container">
                @if(session()->has('message'))
                    <div class="alert alert-success container mt-2 mb-2" role="alert"
                         style="width: 730px; text-align: center">
                        <strong>{{__('Successfully')}}
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle-fill py-2"
                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                        </strong>
                    </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger container mt-2 mb-2 py-2" style="width: 730px; text-align: center">
                        <strong>{{__('Whoops!')}}</strong> {{__('There were some problems with your input.')}}<br><br>
                    </div>
                @endif
            </div>
        </main>
        <div class="container ">@yield('content')</div>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="footer">
                    <div class="col-12 col-md-6 py-4 Reserved"> ©{{__('Copyright')}} <a
                            href="https://freehtml5.co" title="Free HTML5 Bootstrap templates">FreeHTML5.co</a>.
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/datatables-demo.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
    });
</script>

</body>
</html>
