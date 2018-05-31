
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RES Lab | Admin</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{url('bower_components/Ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{url('dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/iCheck/square/blue.css')}}">
  <link rel="icon" type="image/png" href="{{ url('img/undip.png') }}" sizes="32x32">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
   .login-page {
        background: linear-gradient(132deg, #ef6c00 , #0277bd );
        background-size: 400% 400%;
        animation: BackgroundGradient 20s ease infinite;
    }
    
    @keyframes BackgroundGradient {
        0% {background-position: 50% 0%;}
        50% {background-position: 50% 100%;}
        100% {background-position: 50% 0%;}
    }
  </style>
</head>
<body class="hold-transition bg login-page">
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="login-box-body">
  	<div class="login-logo">
      <b>ADMIN</b><br>
    <a href="{{url('/')}}">RESLab</a>
  </div>
    <p class="login-box-msg">Masuk untuk memulai sesimu</p>

    <form action="#" method="post">
      {{csrf_field()}}
      <div class="form-group has-feedback">
        <input type="text" name="nim" class="form-control" placeholder="NIM" title="NIM menggunakan angka dan panjangnya 14 karakter">
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
