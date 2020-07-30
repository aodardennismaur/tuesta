<?php
session_start();
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
    header("Location: ../");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Alumno | Sistema</title>
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
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Lista de Docentes</h1>
            </section>
            <section class="content"><div id="lista" class="row"></div></section>
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
</body>

</html>