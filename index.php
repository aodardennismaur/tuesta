<?php
session_start();
if (isset($_SESSION['tipo'])) {
  if ($_SESSION['tipo'] == 1) {
    header("Location: sistema/alumno/index.php");
  } else if ($_SESSION['tipo'] == 2) {
    header("Location: sistema/docente/index.php");
  }
  return;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Tuesta</title>
  <link rel="stylesheet" href="asset/css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="asset/css/admin/AdminLTE.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Studio</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Login para entrar a la plataforma</p>

      <form id="loginForm" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Correo">
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña">
        </div>
        <div class="row">
          <div class="col-xs-7"></div>
          <!-- /.col -->
          <div class="col-xs-5">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesion</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="registro.html" class="text-center">Registrar nuevo usuario</a>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->


  <script src="asset/js/jquery/jquery.min.js"></script>
  <script src="asset/js/bootstrap/bootstrap.min.js"></script>
  <script src="asset/js/page/index.js"></script> -->
</body>
</html>