<?php
session_start();
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 2) {
    header("Location: ../");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Docente</title>
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
                                    <div class="pull-left">
                                        <a href="#" id="perfil" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
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
            <div class="row">
                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-primary">
                            <h3 class="widget-user-username">Solicitudes</h3>
                        </div>
                        <div class="box-footer no-padding">
                            <ul id="listSoli" class="nav nav-stacked">
                                <li><a href="#">Projects </a></li>
                                <li><a href="#">Tasks </a></li>
                                <li><a href="#">Completed Projects </a></li>
                                <li><a href="#">Followers</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                <div class="col-md-8">
                    <!-- DIRECT CHAT PRIMARY -->
                    <div class="box box-primary direct-chat direct-chat-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Chat</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages">
                                <!-- Message. Default to the left -->
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-info clearfix">
                                        <span id="tituloM" class="direct-chat-name pull-left"></span>
                                    </div>
                                    <!-- /.direct-chat-info -->
                                    <div id="contenidoM" class="direct-chat-text"></div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                                <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-right">Sarah Bullock</span>
                                    </div>
                                    <!-- /.direct-chat-info -->
                                    <div class="direct-chat-text">
                                        You better believe it!
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <form action="#" method="post">
                                <div class="input-group">
                                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary btn-flat">Send</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-footer-->
                    </div>
                    <!--/.direct-chat -->
                </div>
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
            var id = <?php echo $_SESSION["idPerfil"]; ?>;
            $.ajax({
                type: "POST",
                url: "../../controller/solicitudes_docenteCtrl.php",
                data: {
                    id: id
                }
            }).done(function(datos) {
                var datosJSON = datos["datos"];
                var html = '';
                $.each(datosJSON, function(i, value) {
                    html += '<li><a href="#" onclick="cargarMensaje(' + value["id"] + ',' + id + ')">' + value["nombre"] + '<span class="pull-right badge bg-blue">'+ value["cant"] +'</span></a></li>';
                });
                $("#listSoli").html(html);
            });
        });


        $("#formEnvio").submit(function(e) {
            e.preventDefault();
            var correo = "";
            var mensaje = $("#envioMensaje").val();
            var tipo = "2";
            $.ajax({
                type: "POST",
                url: "../../controller/enviar_correoCtrl.php",
                data: {
                    correo: "",
                    mensaje: mensaje,
                    tipo: tipo
                }
            })
        });
    </script>
    <script src="accion.js"></script>
    <!-- <h1>Docente</h1><br>

    <div class="card" style="width: 18rem;">
        <div class="card-header">
            Solicitudes
        </div>
        <ul id="listSoli" class="list-group list-group-flush"></ul>
    </div><br>

    <div class="card border-success mb-3" style="max-width: 50rem;">
        <div id="tituloM" class="card-header bg-transparent border-success"></div>
        <div id="contenidoM" class="card-body text-success">
            <p class="card-text"></p>
        </div>
        <div class="card-footer bg-transparent border-success">
            <form id="formEnvio" class="form-inline">
                <div class="form-group mx-3">
                    <input type="hidden" id="correoAlumno" name="correoAlumno">
                    <input type="text" class="form-control" id="envioMensaje" name="envioMensaje" placeholder="Ingresa tu mensaje">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Enviar</button>
            </form>
        </div>
    </div>

    <button type="button" id="perfil" class="btn btn-primary">Perfil</button>
    <button type="button" id="logout" class="btn btn-primary">Cerrar Sesion</button>
    <script src="../../asset/js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            var id = <?php echo $_SESSION["idPerfil"]; ?>;
            $.ajax({
                type: "POST",
                url: "../../controller/solicitudes_docenteCtrl.php",
                data: {
                    id: id
                }
            }).done(function(datos) {
                var datosJSON = datos["datos"];
                var html = '';
                $.each(datosJSON, function(i, value) {
                    html += '<li class="list-group-item"><button type="button" onclick="cargarMensaje(' + value["id"] + ',' + id + ')">' + value["nombre"] + '(' + value["cant"] + ')</button></li>';
                });
                $("#listSoli").html(html);
            });
        });


        $("#formEnvio").submit(function(e) {
            e.preventDefault();
            var correo = "";
            var mensaje = $("#envioMensaje").val();
            var tipo = "2";
            $.ajax({
                type: "POST",
                url: "../../controller/enviar_correoCtrl.php",
                data:{correo: "",mensaje: mensaje, tipo: tipo}
            })
        });
    </script>
    <script src="accion.js"></script> -->
</body>

</html>