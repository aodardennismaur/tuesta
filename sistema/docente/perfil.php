<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Perfil | Docente</title>
    <link rel="stylesheet" href="../../asset/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../asset/css/admin/AdminLTE.min.css">
    <link rel="stylesheet" href="../../asset/css/admin/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>S</b>TD</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Studio</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
                                <span class="hidden-xs"><?php echo $_SESSION["nombre"] . " " . $_SESSION["paterno"]; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header" style="height: auto;">
                                    <p>
                                        <?php echo $_SESSION["nombre"] . " " . $_SESSION["paterno"] . " " . $_SESSION["materno"]; ?>
                                        <small><?php echo $_SESSION["correo"]; ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <!-- <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div> -->
                                    <div class="pull-right">
                                        <a href="#" id="logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Solicitud de Asesoria</span></a></li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Perfil del Docente</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form id="perfilForm" method="POST" role="form">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label>Apellido Paterno</label>
                            <input type="text" class="form-control" id="paterno" name="paterno" placeholder="Paterno">
                        </div>
                        <div class="form-group">
                            <label>Apellido Materno</label>
                            <input type="text" class="form-control" id="materno" name="materno" placeholder="Materno">
                        </div>
                        <div class="form-group">
                            <label>Especialidad</label>
                            <input type="text" class="form-control" id="espe" name="espe" placeholder="Especialidad">
                        </div>
                        <div class="form-group">
                            <label>Grado de estudio</label>
                            <input type="text" class="form-control" id="grado" name="grado" placeholder="Grado de estudio">
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version Piloto</b> 0.0.1
            </div>
            <strong>Copyright &copy; 2020 <a href="#">Studio S.A.</a>.</strong> Todos los derechos
            reserved.
        </footer>
    </div>
    <script src="../../asset/js/jquery/jquery.min.js"></script>
    <script src="../../asset/js/bootstrap/bootstrap.min.js"></script>
    <script src="accion.js"></script>
    <script>
        $(document).ready(function() {
            cargarDatos();
        });

        function cargarDatos() {
            $.post("../../controller/docente_datosCtrl.php")
                .done(function(datosDocente) {
                    var json = datosDocente['datos'];
                    $('#nombre').val(json['nombre']);
                    $('#paterno').val(json['apePaterno']);
                    $('#materno').val(json['apeMaterno']);
                    $('#correo').val(json['correo']);
                    $('#espe').val(json['espe']);
                    $('#grado').val(json['grado']);
                });
        }
    </script>

    <!-- <h1>Perfil del Docente</h1>
    <form id="perfilForm">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
        </div>
        <div class="form-group">
            <label for="paterno">Apellido Paterno</label>
            <input type="text" class="form-control" id="paterno" name="paterno" placeholder="Paterno">
        </div>
        <div class="form-group">
            <label for="materno">Apellido Materno</label>
            <input type="text" class="form-control" id="materno" name="materno" placeholder="Materno">
        </div>
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo">
        </div>
        <div class="form-group">
            <label for="espe">Especialidad</label>
            <input type="text" class="form-control" id="espe" name="espe" placeholder="Especialidad">
        </div>
        <div class="form-group">
            <label for="grado">Grado de estudio</label>
            <input type="text" class="form-control" id="grado" name="grado" placeholder="Grado de estudio">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <button type="button" id="atras" class="btn btn-primary">Atras</button>

    <script src="../../asset/js/jquery.js"></script>
    <script src="accion.js"></script>
    <script>
        $(document).ready(function() {
            cargarDatos();
        });

        function cargarDatos() {
            $.post("../../controller/docente_datosCtrl.php")
                .done(function(datosDocente) {
                    var json = datosDocente['datos'];
                    $('#nombre').val(json['nombre']);
                    $('#paterno').val(json['apePaterno']);
                    $('#materno').val(json['apeMaterno']);
                    $('#correo').val(json['correo']);
                    $('#espe').val(json['espe']);
                    $('#grado').val(json['grado']);
                });
        }
    </script> -->
</body>

</html>