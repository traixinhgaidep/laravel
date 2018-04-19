<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SF-CMS</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('adminlte/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/skins/_all-skins.min.css')}} ">
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.css') }}">
    @yield('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="{{route('admin.index')}}" class="logo">
            <span class="logo-lg "><i class="fa fa-home"></i><b>  Web 24h</b></span>
        </a>

        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right" style="margin-right: 85px!important;">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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
    @include('admin.layouts.admin.include.side_bar')
    <div class="content-wrapper">
        @if (session('success'))
            <div class="alert alert-success fade in">
                <button class="close" data-dismiss="alert">×</button>
                <i class="fa-fw fa fa-check"></i>
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger fade in">
                <button class="close" data-dismiss="alert">×</button>
                <i class="fa fa-times"></i>
                {{ session('error') }}
            </div>
        @endif
        @yield('css')
        @yield('header')
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>
<!-- ./wrapper -->

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
