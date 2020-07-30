<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Detalle Docente</title>
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
            <div class="callout callout-info">
                <h4 id="nombre"></h4>
                <p id="correo"></p>
                <p id="espe"></p>
                <p id="grado"></p>
            </div>
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Enviar mensaje al Docente</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form id="formulario" method="POST" role="form">
                        <input type="hidden" id="idDocente" name="idDocente">
                        <input type="hidden" id="idAlumno" name="idAlumno" value="<?php echo $_SESSION["idPerfil"]; ?>">
                        <input type="hidden" id="nombreF" name="CDoc">
                        <input type="hidden" id="correoF" name="NDoc">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" id="destinatario" name="destinatario">
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="email" class="form-control" id="destino" name="destino">
                        </div>
                        <div class="form-group">
                            <label>Mensaje</label>
                            <textarea id="mensaje" name="mensaje" class="form-control" rows="3" placeholder="Ingresa tu mensaje"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
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
    <script>
        $(document).ready(function() {
            cargarDetalle();
            $("#formulario").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "../../controller/enviar_correoCtrl.php",
                    data: $(this).serialize()
                }).done(function(datos) {
                    console.log(datos);
                    $("#destinatario").append("");
                    $("#destino").append("");
                    $("#mensaje").val("");
                });
            });
        });

        $('#logout').on('click', function(e) {
            e.preventDefault();
            $.post("../../controller/usuario_logoutCtrl.php")
                .done(function() {
                    window.location = '../index.php'
                });
        });

        $("#atras").on('click', function() {
            window.location = '../';
        });

        function cargarDetalle() {
            var url = $(location).attr("href");
            var param = url.indexOf("=");
            var id = url.substr(param + 1);
            if (id != "") {
                $.ajax({
                    type: "POST",
                    url: "../../controller/docente_detalleCtrl.php",
                    data: {
                        id: id
                    }
                }).done(function(datos) {
                    var datosJSON = datos["datos"];
                    $("#nombre").append(datosJSON["nombre"] + ' ' + datosJSON["apePaterno"] + ' ' + datosJSON["apeMaterno"]);
                    $("#correo").append("Corre: " + datosJSON["correo"]);
                    $("#espe").append("Especialidad: " + datosJSON["espe"]);
                    $("#grado").append("Grado: " + datosJSON["grado"]);
                    $("#nombreF").val(datosJSON["nombre"]);
                    $("#correoF").val(datosJSON["correo"]);
                    $("#idDocente").val(datosJSON["id"]);
                });
            }
        }
    </script>
</body>

</html>