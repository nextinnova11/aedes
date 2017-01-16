<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ketua Lokaliti : Sistem Amaran Awal Aedes</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ url('/eAedesEx/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('/eAedesEx/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ url('/eAedesEx/dist/css/skins/_all-skins.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('/eAedesEx/plugins/iCheck/flat/blue.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ url('/eAedesEx/plugins/morris/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ url('/eAedesEx/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ url('/eAedesEx/plugins/datepicker/datepicker3.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ url('/eAedesEx/plugins/daterangepicker/daterangepicker-bs3.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ url('/eAedesEx/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <script src="{{ url('/eAedesEx/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
    <link rel="stylesheet" href="{{ url('/eAedesEx/plugins/fullcalendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ url('/eAedesEx/plugins/fullcalendar/fullcalendar.print.css') }}" media="print">
    <link rel="stylesheet" href="{{ URL('/eAedesEx/dist/css/sweetalert.css')}}">
    <script src="{{ URL('/eAedesEx/dist/js/sweetalert.min.js')}}"></script>

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="{{(url('/ketuaLokaliti'))}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b></b>eAx</span>
          <!-- logo for regular state and mobile devices -->
          <!-- <span class="logo-lg"><b>Admin-</b>eAedesEx</span> -->
          <span class="logo-lg"><b>Ketua Lokaliti</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{ url('/eAedesEx/dist/img/iconNoAvatar.png') }}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ Auth::user()->name}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{ url('/eAedesEx/dist/img/iconNoAvatar.png') }}" class="img-circle" alt="User Image">
                    <p>
                      {{ Auth::user()->name}}
                      <small>Ketua Lokaliti : {{ Auth::user()->created_at}}</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{{ url('profil-ketua-lokaliti', $value = Auth::user()->id) }}" class="btn btn-default btn-flat">Profil</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Log Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <!-- <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li> -->
            </ul>
          </div>
        </nav>
      </header>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ url('/eAedesEx/dist/img/iconNoAvatar.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->name}}</p>
              <i class="fa fa-circle text-success"></i> Online</a>
            </div>

          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">NAVIGASI UTAMA</li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-group"></i> <span>Pengguna</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{ url('/semak-permohonan-KL')}}"><i class="fa fa-check"></i> Semak Permohonan</a></li>
                  <li><a href="{{ url('/daftar-baru-pembanci')}}"><i class="fa fa-user"></i> Daftar Pembanci</a></li>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-building-o"></i>
                <span>Maklumat Kawasan</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ URL('senarai-kawasan')}}"><i class="fa fa-list"></i> Senarai Kawasan</a></li>
              <!-- </ul>
              <ul class="treeview-menu"> -->
                <li><a href="{{ URL('daftar-kawasan') }}"><i class="fa fa-plus"></i> Daftar Kawasan</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-tasks"></i>
                <span>Bancian</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ URL('senarai-bancian')}}"><i class="fa fa-list"></i> Senarai Bancian</a></li>
              <!-- </ul>
              <ul class="treeview-menu"> -->
                <li><a href="{{ URL('calendar') }}"><i class="fa fa-plus"></i> Jadual Bancian</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-bar-chart"></i> <span>Laporan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ URL('/laporan-kawasan-KL') }}"><i class="fa fa-map-marker"></i> Kawasan</a></li>
                <li><a href="{{ URL('/laporan-soalan-bancian-KL') }}"><i class="fa fa-bar-chart"></i> Soalan Bancian</a></li>
                <li><a href="{{ URL('/laporan-bulanan-KL') }}"><i class="fa fa-moon-o"></i> Bulanan</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>Profil</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('profil-ketua-lokaliti', $value = Auth::user()->id) }}"><i class="fa fa-tv"></i> Papar Maklumat</a></li>
                <li><a href="{{ url('kemaskini-profile-kl', $value = Auth::user()->id) }}"><i class="fa fa-pencil"></i> Kemaskini Maklumat</a></li>
                <li><a href="{{ url('ubah-kata-laluan-KL', $value = Auth::user()->id) }}"><i class="fa fa-wrench"></i> Ubah Kata Laluan</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
