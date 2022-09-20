<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Control de reportes colegio ITC">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Marvin Vásquez">
   <!-- <meta name="theme-color" content="#6ABD51"> -->
    <title><?= $data['page_tag'];?></title>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= media();?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?= media();?>/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="<?= media();?>/css/colores.css">
    <link rel="stylesheet" type="text/css" href="<?= media();?>/css/estilo_form_register.css">
    <link rel="stylesheet" type="text/css" href="<?= media();?>/css/estilo_botones.css">
    <!-- Font-icon css-->
    <script src="https://kit.fontawesome.com/75bab15130.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
     
    <link rel="shortcut icon" type="image/x-icon" href="./Assets/img/icono_itc.ico">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?= base_url() ?>dashboard">Control de Reportes</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        
        
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <!-- <li><a class="dropdown-item" href="<?= base_url() ?>opciones"><i class="fa fa-cog fa-lg"></i> Settings</a></li>-->
            <li><a class="dropdown-item" href="<?= base_url() ?>Usuarios/perfil"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
            <li><a class="dropdown-item" href="<?= base_url() ?>logout"><i class="fa fa-sign-out fa-lg"></i> Salir</a></li>
          </ul>
        </li>
      </ul>
    </header>

    <?php require_once("nav_admin.php");?>
    