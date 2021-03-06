
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{url('bower_components/Ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/pace/pace.min.css')}}">
  @yield('css')
  <link rel="stylesheet" href="{{url('dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{url('dist/css/skins/_all-skins.min.css')}}">
  <link rel="icon" type="image/png" href="{{ url('img/undip.png') }}" sizes="32x32">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    #bodi{
        background: linear-gradient(90deg, #39CCCC, #00a65a);
        background-size: 400% 400%;
        animation: BackgroundGradient 30s ease infinite;
        color:#0d0d0d ;

    }
    @keyframes BackgroundGradient {
        0% {background-position: 0% 50%;}
        50% {background-position: 100% 50%;}
        100% {background-position: 0% 50%;}
    }
    #logo{
        max-height:100%;
        height:100%;
        width:auto;
        margin: 0 auto
    }
  </style>
</head>
<body class="hold-transition skin-blue-light layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top" id="duwur">
      <div class="container">
        <div class="navbar-header">
          <a href="{{url('')}}" class="navbar-brand">
            <img class="logo" id="logo" src="{{ url('img/undip.png') }}">
            <b>RES</b>Lab
          </a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            @yield('navbar')
          </ul>
        </div>
        <div class="navbar-custom-menu" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{url('/login')}}"><span class="fa fa-sign-in">&nbsp;Masuk</span></a></li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper" id="bodi">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">

      </section>

      <!-- Main content -->
      <section class="content">
        @yield('konten')
      </section>
    </div>
  </div>
</div>
<script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
@yield('js')
<script src="{{url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{url('bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
<script src="{{url('dist/js/demo.js')}}"></script>
<script src="{{url('bower_components/PACE/pace.min.js')}}"></script>
<script type="text/javascript">
  $(document).ajaxStart(function () {
    Pace.restart()
  })
  $('.ajax').click(function () {
    $.ajax({
      url: '#', success: function (result) {
        $('.ajax-content').html('<hr>Ajax Request Completed !')
      }
    })
  })
</script>

</body>
</html>
