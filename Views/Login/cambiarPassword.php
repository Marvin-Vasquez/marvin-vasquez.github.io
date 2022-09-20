<?php


?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Marvin Vásquez">
	<title>Recuperar contraseña</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?= media();?>/img/icono_itc.ico">
   
	<link rel="stylesheet" type="text/css" href="<?= media();?>/css/estilo_login2.css">
    <script src="https://kit.fontawesome.com/75bab15130.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
</head>
<body>
    <div class="contenedor">
        <form class="form" id="formChangePass" name="formChangePass" action="">
			<img class="img-form" src="<?= media();?>/img/logo_itc.jpg" alt="logo">
			<div class="form-header">
				<h5 class="form-title"><i class="fa-solid fa-key"></i> Cambiar contraseña</h5>
				<br>	
			</div>
            <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $data['id'] ?>">
            <input type="hidden" id="txtCorreo" name="txtCorreo" value="<?= $data['correo'] ?>">
            <input type="hidden" id="txtToken" name="txtToken" value="<?= $data['token'] ?>">
			<input type="password" class="form-input"  id="txtPassword" name="txtPassword" placeholder="Nueva contraseña">
            <input type="password" class="form-input"  id="txtConfirmPassword" name="txtConfirmPassword" placeholder="Confirme contraseña">			
			<button type="submit" class="btn-submit"><i class="fa-solid fa-share-from-square"></i> Actualizar</button> 
		</form>
	</div>  
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