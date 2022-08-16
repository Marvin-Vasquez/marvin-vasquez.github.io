<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./Assets/css/estilo_form_register.css">
    <link rel="stylesheet" type="text/css" href="./Assets/css/estilo_lista_student.css">
    <link rel="shortcut icon" type="image/x-icon" href="./Assets/img/icono_itc.ico">

    <title>Sistema de Reportes</title>
</head>
<body>
    <div class="contenedor-primario">
        <form action="#" method="POST class="form-register">
        <h2 class="form-title">Registro de usuario</h2>
            <div class="contenedor-inputs">
			    <input type="text"" class="form-input-48" placeholder="Nombre" required>
			    <input type="text"  class="form-input-48" placeholder="Apellido" required>
			    <input type="text"  class="form-input-48" placeholder="Nombre de usuario" required>
			    <input type="email" class="form-input-48" placeholder="Correo electrónico" required>
			    <label class="form-label">Tipo de Usuario</label>
			    <select class="select-box" required>
				    	<option>seleccione...</option>
					    <option>Administrador</option>
					    <option>Docente</option>
			    </select>
			    <input type="password" class="form-input-48" placeholder="Contraseña" required>
			    <input type="password" class="form-input-48" placeholder="Confirme contraseña" required>	
			    <input type="submit" class="btn-submit" value="Registrar"><!--onclick="message()"-->
            </div>
        </form>
    </div>
</body>
</html>
