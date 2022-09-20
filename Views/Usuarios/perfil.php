<?php  headerAdmin($data);?>


<main class="app-content" style="background: #1B7015;">
      <div class="row">
        <div class="col-md-8">
          <div class="tile">
            <img class="img-form" src="<?= media();?>/img/logo_itc.jpg" style="width: 120px; height: 120px;  position: absolute; top: 2px;">
            <div style="width: auto; height:110px"></div>
            <h3 class="tile-title">Actualizar datos</h3>
            <div style="width: auto; height:5px; background: #A5A73C;"></div>
            <?php /*dep($_SESSION['userData']);*/?>
            <div class="tile-body">
              <form  id="formUpdateUser" name="formUpdateUser" action="">
              <br>
              <p class="text-primary">*Todos los campos son obligatorios.</p>
                <!--<input type="hidden" id="idUsuario" name="idUsuario" value="  $_SESSION['idUsuario']; ">  -->
               
                <div class="form-group">
                  <label class="control-label">Nombre</label>
                  <input type="text" class="form-control" id="txtNombre" name="txtNombre" value="<?= $_SESSION['userData']['nombre']; ?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Apellidos</label>
                  <input type="text" class="form-control" id="txtApellido" name="txtApellido" value="<?= $_SESSION['userData']['apellido']; ?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Nombre de usuario</label>
                  <input type="text" class="form-control" id="txtNombreUsuario" name="txtNombreUsuario" value="<?= $_SESSION['userData']['username']; ?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Correo Electrónico</label>
                  <input type="email" class="form-control" id="txtCorreo" name="txtCorreo" value="<?= $_SESSION['userData']['correo']; ?>">
                </div>  
                <div class="form-group">
                  <label class="control-label">Contraseña</label>
                  <input type="password" class="form-control" id="txtPass" name="txtPass">
                </div>  
                <div class="form-group">
                  <label class="control-label">Confirmar contraseña</label>
                  <input type="password" class="form-control" id="txtConfirmPass" name="txtConfirmPass">
                </div>  
                <div class="tile-footer">
                <button type="submit" class="btn btn-primary" style="background: #92F54E; border-color:#92F54E;"><i class="fa fa-fw fa-lg fa-check-circle"></i>Actualizar Datos</button>&nbsp;&nbsp;&nbsp;
              
                </div>
              </form>
            </div>
            
          </div>
        </div>
        
    </main>

<?php 
    footerAdmin($data);
?>
