<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PuntoVenta | Iniciar Sesión</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="adminlte/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="adminlte/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="adminlte/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="adminlte/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Punto</b>Venta</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Inicia sesión para tener acceso</p>

    <form action="{{ route('login') }}" method="POST">

      {{ csrf_field() }}


      <div class="form-group has-feedback   {!! $errors->has('usuario') ? 'has-error':'' !!} " >
        <input type="text" class="form-control" placeholder="Ingrese usuario" name="usuario" value="{{ old('usuario') }}" >
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        {!! $errors->first('usuario','<span class="help-block">:message</span>') !!}



      </div>
      <div class="form-group has-feedback  {!! $errors->has('password') ? 'has-error':'' !!}" >
        <input type="password" class="form-control" placeholder="Ingrese contraseña" name="password" value="{{ old('password') }}">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        {!! $errors->first('password','<span class="help-block">:message</span>') !!}



      </div>
      <div class="row">
<div class="col-xs-8">

</div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


    <!-- /.social-auth-links -->

    <h5>Si olvidó su contraseña, comuniquese con el administrador</h5>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="adminlte/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="adminlte/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="adminlte/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
