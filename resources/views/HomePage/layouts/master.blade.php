
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SF-CMS</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('css/adminlte/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/adminlte/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte/_all-skins.min.css')}} ">
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.css') }}">
    @yield('css')
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body>
    <header class="main-header" >

        <!-- Logo -->
        <a href="{{route('home')}}" class="logo white" style="color: white">
            <span class="logo-lg "><i class="fa fa-home"></i><b>TIN TUC 24h</b></span>
        </a>

        <nav class="navbar navbar-static-top">

            <!-- Navbar Right Menu -->
            <div class="collapse navbar-collapse" id="app-navbar-collapse white" style="color: white">

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right" style="margin-right: 85px!important;">
                    <!-- Authentication Links -->
                    @guest
                    <li ><a href="{{ route('login') }}" class="white">Login</a></li>
                    <li><a href="{{ route('register') }}" class="white">Register</a></li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle white" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre >
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" >
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </div>

    </nav>
</header>
    @yield('content')
    
    

    <script>
        {{--var curRoute = '{{ $route }}';--}}
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    {{--<script src="{{ View::autoVersion('js/admin/main.js') }}"></script>--}}
    @yield('script')
</body>
</html>
