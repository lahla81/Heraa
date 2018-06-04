<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <title>شركة حراء | @yield('title')</title>
</head>
<body>
    <div class="container-fluid">
        <!-- بداية الشريط العلوي -->
        <div class="row">
            <nav class="navbar navbar-default custom-navbar">
                <div class="navbar-header">
                    <a href="/" class="navbar-brand">
                        <img src="{{ asset('images/heraa1.png') }}" alt="الصفحة الرئيسية">
                    </a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-menu" aria-expanded="false">
                        <i class="fa fa-bars fa-lg"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse-menu" aria-expanded="true">
                    <ul class="nav navbar-nav navbar-right">
                        <li @yield('main-nav')>
                            <a href="/">الرئيسية</a>
                        </li>
                        <li @yield('about-nav')>
                            <a href="{{route('team.index')}}">عن الشركة</a>
                        </li>
                        <li @yield('project-nav')>
                            <a href="{{route('projects.index')}}">مشاريعنا</a>
                        </li>
                        <li @yield('plug-nav')>
                            <a href="{{route('plugs.index')}}">المدونة</a>
                        </li>
                        <li @yield('contact-nav')>
                            <a href="{{route('contact')}}">تواصل معنا</a>
                        </li>

                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('دخول') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('التسجيل') }}</a></li>
                        @else
                            <li class="dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   <img class="img-circle" style="width:25px;" src="{{ asset('storage/'.$image)}}" alt="{{ Auth::user()->name }}">  <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('تسجيل الخروج') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>  <!-- نهاية الشريط العلوي -->

        @yield('content')

        <!-- بداية زيل الصفحة -->
        <div class="row">
            <div class="col-xs-12 center" id="footer">
               <a href="/"><img src="{{asset('images/Heraa1.png')}}" alt="شركة حراء"></a>
                <hr class="hr-small">
                <div class="footer-links">
                    <a href="/"> الرئيسية</a>
                    <a href="{{route('team.index')}}">عن الشركة</a>
                    <a href="{{route('projects.index')}}">مشاريعنا</a>
                    <a href="{{route('plugs.index')}}">المدونة</a>
                    <a href="{{route('contact')}}">تواصل معنا</a>
                </div>
                <hr>
                <form class="form-inline">
                    <label>اشترك بالنشرة البريدية</label>
                    <br>
                    <div class="input-group input-group-lg">
                        <input type="text" class="form-control" id="footer-email" placeholder="البريد الإلكتروني" name="email">
                        <span class="input-group-btn">
                            <button class="btn btn-defualt footer-btn">متابعة</button>
                        </span>
                    </div>
                </form>
                <hr>
                <span>جميع الحقوق محفوظة &copy;</span>
            </div>
        </div> <!-- نهاية زيل الصفحة -->
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
</body>
</html>
