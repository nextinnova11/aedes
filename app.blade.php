<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Amaran Awal Aedes Ex</title>

    <link rel="stylesheet" href="{{ url('eAedesEx/bootstrap/css/bootstrap.css') }}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{ url('eAedesEx/dist/css/AdminLTE.min.css') }}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{ url('eAedesEx/dist/css/skins/skin-blue.min.css') }}" media="screen" title="no title" charset="utf-8">



</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Sistem Amaran Awal Aedes Ex
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <!-- <li><a href="{{ url('/home') }}">Utama</a></li> -->
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Daftar Masuk</a></li>
                        <!-- <li><a href="{{ url('/register') }}">Daftar Baru</a></li> -->
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Keluar</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="{{ url('eAedesEx/bootstrap/js/jquery.min.js') }}" charset="utf-8"></script>
    <script src="{{ url('eAedesEx/bootstrap/js/bootstrap.js') }}" charset="utf-8"></script>
</body>
</html>
