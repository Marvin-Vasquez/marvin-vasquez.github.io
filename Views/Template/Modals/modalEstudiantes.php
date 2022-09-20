<!-- Modal -->
<div class="modal fade" id="modalFormEstudiantes" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header headerRegister"  style="background-color:#6ABD51; color:white;">
        <h5 class="modal-title" id="titleModal">Nuevo Estudiante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST" class="form-register" id="formEstudiante" name="formEstudiante">
          <input type="hidden" id="TipoOperacion" name="TipoOperacion" value="">
          <p class="text-primary">Todos los campos son obligatorios.</p>
          <input type="text" id="txtCarnet" name="txtCarnet" class="form-input-100 valid validNumber" placeholder="Número de Carnet" onkeypress="return controlTag(event);">
          <input type="text" id="txtNombre" name="txtNombre" class="form-input-48 valid validText" placeholder="Nombre">
          <input type="text" id="txtApellido" name="txtApellido" class="form-input-48 valid validText" placeholder="Apellido">
          <input type="text" id="txtNombreEncargado" name="txtNombreEncargado" class="form-input-100 valid validText" placeholder="Nombre de encargado" >
          <input type="email" id="txtCorreoEncargado" name="txtCorreoEncargado" class="form-input-100 valid validEmail" placeholder="Correo electrónico de encargado" >
          <div class="contenedor-inputs">
            <label class="form-label">Nivel Educativo</label>
            <select id="listNiveles" name="listNiveles" class="select-box">
			</select>
            <label class="form-label">Sección</label>
            <select id="listSeccion" name="listSeccion" class="select-box">
			</select>
          </div>
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
<div class="modal fade" id="modalviewEstudiante" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header headerRegister"  style="background-color:#6ABD51; color:white;">
        <h5 class="modal-title" id="titleModal">Datos del Estudiante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-hover table-bordered">
          <tbody>
          <tr>
            <td>Carnet</td>
            <td id="carnet"></td>   
          </tr>    
          <tr>
            <td>Nombre</td>
            <td id="nombre"></td>    
          </tr>
          <tr>
            <td>Apellidos</td>
            <td id="apellido"></td>    
          </tr>
          <tr>
            <td>Nombre del encargado</td>
            <td id="nombreEncargado"></td>    
          </tr>
          <tr>
            <td>Correo electrónico del encargado</td>
            <td id="correoEncargado"></td>    
          </tr>
          <tr>
            <td>Grado</td>
            <td id="grado"></td>    
          </tr>
          <tr>
            <td>Sección</td>
            <td id="seccion"></td>    
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