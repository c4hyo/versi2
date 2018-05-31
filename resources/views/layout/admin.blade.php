
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{url('bower_components/Ionicons/css/ionicons.min.css')}}">
  @yield('css')
  <link rel="stylesheet" href="{{url('dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{url('dist/css/skins/_all-skins.min.css')}}">
  <link rel="icon" type="image/png" href="{{ url('img/undip.png') }}" sizes="32x32">
  <link rel="stylesheet" href="{{url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">

  <style>
   body{
   font-family: 'Roboto Condensed', sans-serif;
   }
  </style>
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Lab</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>RESLab</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

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
          <img src="{{url('img/sop.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>@yield('nama')</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Navigasi Utama</li>
        <li>
          <a href="">
            <i class="fa fa-handshake-o"></i>
            <span>Peminjaman</span>
          </a>
        </li>
        <li>
          <a href="">
            <i class="fa fa-pencil-square-o"></i>
            <span>Pengelolaan</span>
          </a>
        </li>
        <li>
          <a href="">
            <i class="fa fa-pencil"></i>
            <span>Posting</span>
          </a>
        </li>
        <li>
          <a href="">
            <i class="fa fa-mortar-board"></i>
            <span>Praktikum</span>
          </a>
        </li>
        <li>
          <a href="">
            <i class="fa fa-wrench"></i>
            <span>Pengaturan</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-sign-out"></i>
            <span>Keluar</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/bukanwp-admin/logout')}}"><i class="fa fa-check"></i>Ya</a></li>
            <li><a href=""><i class="fa fa-remove"></i>Tidak</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      @yield('header')
    </section>

    <!-- Main content -->
    <section class="content">
      @yield('konten')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{url('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
@yield('js')
<script src="{{url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{url('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{url('bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
<script src="{{url('dist/js/pages/dashboard.js')}}"></script>
<script src="{{url('dist/js/demo.js')}}"></script>
</body>
</html>
