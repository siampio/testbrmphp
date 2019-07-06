<?php
session_start();
include '../includes/seguridad.php';
?>
<!DOCTYPE html>
<html lang="es">

    <body id="mimin" class="dashboard">

        <!-- start: Header -->
          <nav class="navbar navbar-default header navbar-fixed-top">
            <div class="col-md-12 nav-wrapper">
              <div class="navbar-header" style="width:100%;">
                <div class="opener-left-menu is-open">
                  <span class="top"></span>
                  <span class="middle"></span>
                  <span class="bottom"></span>
                </div>
                  <a href="/revitec/platformUser/index.php" class="navbar-brand"> 
                   <b>REVITEC <?php echo " - ".$_SESSION["empresa"]?></b>
                  </a>
                <ul class="nav navbar-nav navbar-right user-nav">
                  <li class="user-name"><span><?php echo $_SESSION['username'] ?></span></li>
                    <li class="dropdown avatar-dropdown">
                     <img src="/revitec/asset/img/avatar.jpg" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                     <ul class="dropdown-menu user-dropdown">
                       <li><a href="/revitec/profileUser/profileUser.php"><span class="fa fa-user"></span> Mi perfil</a></li>
                       <li><a href="/revitec/login/logout.php"><span class="fa fa-lock"></span> Cerrar Sesion</a></li>
                       <li role="separator" class="divider"></li>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

        <!-- end: Header -->

        <div class="container-fluid mimin-wrapper">
            <!-- start:Left Menu -->
              <div id="left-menu">
                <div class="sub-left-menu scroll">
                  <ul class="nav nav-list">
                      <li><div class="left-bg"></div></li>
                      <li class="time">
                        <h1 class="animated fadeInLeft">21:00</h1>
                        <p class="animated fadeInRight">Sat,October 1st 2029</p>
                      </li>
                      <li class="active ripple">
                        <a href="/revitec/platformUser/index.php"><span class="fa-home fa"></span> Inicio                          
                        </a>                        
                      </li>
                      <li class="ripple">
                        <a class="tree-toggle nav-header">
                          <span class="fa fa-paper-plane"></span> Envio
                          <span class="fa-angle-right fa right-arrow text-right"></span>
                        </a>
                        <ul class="nav nav-list tree">
                          <li><a href="/revitec/envioMensajes/regVehiculos.php">Enviar SMS</a></li>
                          <li><a href="/revitec/historial_envio/regHistorial.php">Historial Envio</a></li>
                          <li><a href="/revitec/reporte_envio/ReporteEnvio.php">Reporte de envio</a></li>                         
                        </ul>
                      </li>
                      <li class="ripple">
                        <a href="/revitec/CargarDatos/cargadatos.php">
                          <span class="fa fa-upload"></span> Subir archivo
                        </a>
                      </li>
                    </ul>
                  </div>
              </div>

            <!-- end: Left Menu -->
</html>