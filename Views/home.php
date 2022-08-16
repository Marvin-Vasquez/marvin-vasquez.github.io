<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de reportes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Assets/css/panel-estilo.css">
    <link rel="stylesheet" type="text/css" href="./Assets/css/estilo_form_register.css">
    <script src="https://kit.fontawesome.com/75bab15130.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/x-icon" href="./Assets/img/icono_itc.ico">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center align-content-center">
            <div class="col-8 barra">
                <h4 class="text-light">Control de Reportes</h4>
            </div>
            <div class="col-4 text-right barra">
                <ul class="navbar-nav mr-auto">
                    <li>
                        <a href="#" class="px-3 text-light perfil dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" 
                        aria-haspopup="true" aria-expanded="false">Marvin Vásquez<i class="fas fa-user-circle user"></i></a>
                        <div class="dropdown-menu" aria-labelledby="navbar-dropdown">
                            <a class="dropdown-item menuperfil cerrar" href="cerrar-sesion.php"><i class="fas fa-sign-out-alt m-1"></i>Salir
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="barra-lateral col-12 col-sm-auto">
                <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
   <!-- evaluar tipo de usuario "1" -->
                    <a href="#"><i class="fas fa-home"></i><span>Inicio</span></a>
                    <a href="<?php echo base_url(); ?>usuarios"><i class="fa-solid fa-user-plus"></i><span>Registro de usuarios</span></a>
                    <a href="#"><i class="fa-solid fa-user-graduate"></i><span>Registro de alumnos</span></a>
                    <a href="#"><i class="fa-solid fa-chalkboard"></i><span>Registro de cursos</span></a>
                    <a href="#"><i class="fa-solid fa-book-open"></i></i><span>Record académico</span></a>            
    <!-- cerrar evaluacion tipo usuario "1", evaluar tipo usuario "2" -->              
                    <a href="#"><i class="fa-solid fa-file-lines"></i></i></i>Ingreso de reportes</span></a>
                </nav>
    <!-- Terminar evaluación tipo de usuario "2" -->
                <br>
                <div class="image">  
                    <img src="<?php echo base_url(); ?>Assets/img/logo_itc.jpg" alt="logo" style="width:160px; height:160px; display:block; margin:0px auto; border-radius:48%">
                </div> 
                
            </div>
            <main class="main col">
                <p><?php echo base_url(); ?></p>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/646c794df3.js"></script>
</body>

</html>