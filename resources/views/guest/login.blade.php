
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RES Lab | Login</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{url('bower_components/Ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{url('dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/iCheck/square/blue.css')}}">
  <link rel="icon" type="image/png" href="{{ url('img/undip.png') }}" sizes="32x32">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
  	body, html {
    height: 100%;
}

.bg { 
    /* The image used */
    background-image: url("{{url('img/bg.jpg')}}");

    /* Full height */
    height: 50%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
  </style>
</head>
<body class="hold-transition bg login-page">
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="login-box-body">
  	<div class="login-logo">
    <a href="{{url('/')}}"><b>RES</b>Lab</a>
  </div>
    <p class="login-box-msg">Masuk untuk memulai sesimu</p>

    <form action="{{url('/login')}}" method="post">
      {{csrf_field()}}
      <div class="form-group has-feedback">
        <input type="text" name="nim" class="form-control" placeholder="NIM" pattern="(?=.*[0-9])(?=.*\L)" title="NIM menggunakan angka dan panjangnya 14 karakter">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Kata Sandi" id="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" onchange="lihatPass()">
          Lihat kata sandi
        </label>
      </div>
      <div class="row">
        <div class="col-sm-8"></div>
        <div class="col-sm-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
        </div>
      </div>
    </form>
    <div style="padding-top:10px; ">
      @if(session('sukses'))
      <div class="alert alert-success">
          <p align="center">{{ session('sukses') }}</p>
      </div>
    @elseif(session('gagal'))
      <div class="alert alert-danger">
          <p align="center">{{ session('gagal') }}</p>
      </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    </div>
    </div>
</div>
<script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{url('plugins/iCheck/icheck.min.js')}}"></script>
<script>
  function lihatPass() {
    var pass  = document.getElementById("password");
    if(pass.type == "password"){
      pass.type   = "text";
    }else{
      pass.type   = "password";
    }
  }
</script>
</body>
</html>
