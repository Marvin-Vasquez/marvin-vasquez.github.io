<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media();?>/img/logo_itc.jpg" alt="User Image">
      <div style="height:10px; width:auto"></div> 
      <div>
          <p class="app-sidebar__user-name" style="font-style: oblique;font-size: 14px; line-height: 1;">
            <?= $_SESSION['userData']['nombre'];?>
        </p>
        <p class="app-sidebar__user-name" style="font-style: oblique; font-size: 14px; line-height: 2;">
            <?= $_SESSION['userData']['apellido'];?>
        </p>
        <p class="app-sidebar__user-designation" style="font-style: oblique; font-size: 14px;">
            <?= $_SESSION['userData']['tipo'];?>
        </p>  
        </div>
      </div>
      <ul class="app-menu">
        <?php if($_SESSION['userData']['tipo_rol']==1){?>
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
        <?php } ?>
        <?php if($_SESSION['userData']['tipo_rol']==2){?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                
                <i class="fa-solid fa-file-pen"></i>
                <span class="app-menu__label">&nbsp; Reportes</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url();?>reportes"><i class="icon fa fa-circle-o"></i> Ingresar reportes</a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if($_SESSION['userData']['tipo_rol']==3){?>
        <li>
            <a class="app-menu__item" href="<?= base_url();?>record">
                <i class="app-menu__icon fa fa-history" aria-hidden="true"></i>
                <span class="app-menu__label">Record académico</span>
            </a>
            <a class="app-menu__item" href="<?= base_url();?>record/reportes_diarios">
                <i class="fa-sharp fa-solid fa-bell" aria-hidden="true"></i>
                <span class="app-menu__label">&nbsp; Estudiantes Reportados</span>
            </a>
        </li>
        <!--
        <li>
        <a class="app-menu__item" href="<?= base_url();?>notificar">
                <i class="fa-solid fa-paper-plane" aria-hidden="true"></i>
                <span class="app-menu__label">&nbsp; Notificar a padres de familia</span>
            </a>
        </li> -->
        <?php } ?>
        <li>
            <a class="app-menu__item" href="<?= base_url();?>logout">
               
                <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                <span class="app-menu__label">Salir</span>
            </a>
        </li>

      </ul>
    </aside>