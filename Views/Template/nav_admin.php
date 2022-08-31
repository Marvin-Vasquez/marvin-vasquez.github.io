<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media();?>/img/logo_itc.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">Marvin Vásquez</p>
          
        </div>
      </div>
      <ul class="app-menu">
        <li>
            <a class="app-menu__item" href="<?= base_url();?>dashboard">
                
                <i class="app-menu__icon fa fa-home" aria-hidden="true"></i>
                <span class="app-menu__label">Inicio</span>
            </a>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-users" aria-hidden="true"></i>
                <span class="app-menu__label">Usuarios</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url();?>usuarios"><i class="icon fa fa-circle-o"></i> Usuarios</a></li>
                <li><a class="treeview-item" href="<?= base_url();?>roles"><i class="icon fa fa-circle-o"></i> Roles</a></li>
                
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-graduation-cap" aria-hidden="true"></i>
                <span class="app-menu__label">Estudiantes</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url();?>estudiantes"><i class="icon fa fa-circle-o"></i> Estudiantes</a></li>
                <li><a class="treeview-item" href="<?= base_url();?>info-estudiantes"><i class="icon fa fa-circle-o"></i> Información</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                
                <i class="app-menu__icon fa-solid fa-chalkboard"></i>
                <span class="app-menu__label">Cursos</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url();?>cursos"><i class="icon fa fa-circle-o"></i> Cursos</a></li>
                <li><a class="treeview-item" href="<?= base_url();?>info-cursos"><i class="icon fa fa-circle-o"></i> Información</a></li>
            </ul>
        </li>
        
        <li>
            <a class="app-menu__item" href="<?= base_url();?>record">
                <i class="app-menu__icon fa fa-history" aria-hidden="true"></i>
                <span class="app-menu__label">Record académico</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="<?= base_url();?>logout">
               
                <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                <span class="app-menu__label">Salir</span>
            </a>
        </li>

      </ul>
    </aside>







<!-- 
<div class="container-fluid">
        <div class="row">
            <div class="barra-lateral col-12 col-sm-auto">
                <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">

                    <a href="#"><i class="fas fa-home"></i><span>Inicio</span></a>
                    <a href="<?php echo base_url(); ?>usuarios"><i class="fa-solid fa-user-plus"></i><span>Registro de usuarios</span></a>
                    <a href="<?= base_url() ?>alumnos"><i class="fa-solid fa-user-graduate"></i><span>Registro de alumnos</span></a>
                    <a href="<?= base_url() ?>cursos"><i class="fa-solid fa-chalkboard"></i><span>Registro de cursos</span></a>
                    <a href="<?= base_url() ?>records"><i class="fa-solid fa-book-open"></i></i><span>Record académico</span></a>                         
                    <a href="<?= base_url() ?>reportes"><i class="fa-solid fa-file-lines"></i></i></i>Ingreso de reportes</span></a>
                </nav>
                <br>
                <div class="image">  
                    <img src="<?php echo base_url(); ?>Assets/img/logo_itc.jpg" alt="logo" style="width:160px; height:160px; display:block; margin:0px auto; border-radius:48%">
                </div> 
                
            </div>
        </div>
    </div>

-->