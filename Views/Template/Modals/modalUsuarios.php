<!-- Modal -->
<div class="modal fade" id="modalFormUsuario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header headerRegister"  style="background-color:#6ABD51; color:white;">
        <h5 class="modal-title" id="titleModal">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST" class="form-register" id="formUsuario" name="formUsuario">
          <input type="hidden" id="idUsuario" name="idUsuario" value="">
          <p class="text-primary">Todos los campos son obligatorios.</p>
          <input type="text" id="txtNombre" name="txtNombre" class="form-input-48" placeholder="Nombre">
          <input type="text" id="txtApellido" name="txtApellido" class="form-input-48" placeholder="Apellido">
          <input type="text" id="txtNombreUsuario" name="txtNombreUsuario" class="form-input-48" placeholder="Nombre de usuario" >
          <input type="email" id="txtCorreo" name="txtCorreo" class="form-input-48" placeholder="Correo electrónico" >
          <div class="contenedor-inputs">
            <label class="form-label">Tipo de Usuario</label>
            <select id="listTipo" name="listTipo" class="select-box">
			</select>
          </div>
          <input type="password" id="txtPass" name="txtPass" class="form-input-48" placeholder="Contraseña">
		  <input type="password" id="txtConfirmPass" class="form-input-48" placeholder="Confirme contraseña">	
          <br><br>
          <div class="tile-footer">
            <button id="btnActionForm" class="btn btn-primary" style="background-color: #198B09;" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>
                &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" style="background-color: #198B09;" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
          </div>
        </form>  
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalviewUsuario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header headerRegister"  style="background-color:#6ABD51; color:white;">
        <h5 class="modal-title" id="titleModal">Datos del Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-hover table-bordered">
          <tbody>
          <tr>
            <td>Código</td>
            <td id="id"></td>   
          </tr>    
          <tr>
            <td>Nombre</td>
            <td id="Nombre"></td>    
          </tr>
          <tr>
            <td>Apellidos</td>
            <td id="Apellido"></td>    
          </tr>
          <tr>
            <td>Nombre de usuario</td>
            <td id="UserName"></td>    
          </tr>
          <tr>
            <td>Correo</td>
            <td id="mail"></td>    
          </tr>
          <tr>
            <td>Tipo de usuario</td>
            <td id="tipo"></td>    
          </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
          <button  type ="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #198B09;"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar  </a></button>
      </div>
    </div>
  </div>
</div>