<?php


?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Marvin Vásquez">
	<title>Inicio de sesión</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?= media();?>/img/icono_itc.ico">
   
	<link rel="stylesheet" type="text/css" href="<?= media();?>/css/estilo_login2.css">
    <script src="https://kit.fontawesome.com/75bab15130.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
</head>
<body>
<section class="login-content">
   <div class="login-box"> 
   <div id="divLoading">
		<div>
			<img src="<?= media();?>/img/loading.svg" alt="loading">
		</div>
	</div> 
    <div class="contenedor">
	
		<form method="POST" class="form" id="formLogin" name="formLogin" action="">
			<img class="img-form" src="<?= media();?>/img/logo_itc.jpg">
			<div class="form-header">
				<h5 class="form-title"><i class="fa-solid fa-user"></i> Acceder</h5>
				<br>	
			</div>
			<input type="text" class="form-input" id="txtUsuario" name="txtUsuario" placeholder="Nombre de usuario">
			<input type="password" class="form-input" id="txtPassword" name="txtPassword" placeholder="Contraseña">			
			<button type="submit" class="btn-submit"><i class="fa-solid fa-arrow-right-to-bracket"></i> Iniciar sesión</button>
			<br><br>
			<p><a href="#" id="btnShowFormReset">¿Olvido tu contraseña?</a></p>
		</form>

        <form method="POST" class="form" id="formResetPass" name="formResetPass" action="">
			<img class="img-form" src="<?= media();?>/img/logo_itc.jpg">
			<div class="form-header">
				<h5 class="form-title"><i class="fa-solid fa-lock"></i> Recuperar contraseña</h5>
				<br>	
			</div>
			<input type="mail" class="form-input"  id="txtCorreo" name="txtCorreo" placeholder="Correo registrado">			
			<button type="submit" class="btn-submit"><i class="fa-solid fa-unlock"></i> Reiniciar</button>
			<br><br>
			<p><a href="#" id="btnShowFormLogin"><i class="fa-solid fa-left-long"></i> Regresar a Login</a></p>
		</form>
	
	</div>
  </div>  
</section>
<script>
    const base_url = "<?= base_url(); ?>";
</script>
    <script src="<?= media();?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?= media();?>/js/popper.min.js"></script>
    <script src="<?= media();?>/js/bootstrap.min.js"></script>
    <script src="<?= media();?>/js/fontawesome.js"></script>
    <script src="<?= media();?>/js/main.js"></script>
    <script src="<?= media();?>/js/<?= $data['page_functions_js']?>"></script>
</body>
</html>