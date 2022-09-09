<!-- Modal -->
<div class="modal fade" id="modalFormCursos" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header headerRegister"  style="background-color:#6ABD51; color:white;">
        <h5 class="modal-title" id="titleModal">Nuevo Curso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST" class="form-register" id="formCurso" name="formCurso">
          <input type="hidden" id="TipoOperacion" name="TipoOperacion" value="">
          <p class="text-primary">Todos los campos son obligatorios.</p>
          <input type="text" id="txtCodigo" name="txtCodigo" class="form-input-100" placeholder="Código del curso">
          <input type="text" id="txtNombre" name="txtNombre" class="form-input-100" placeholder="Nombre del curso">
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
<div class="modal fade" id="modalviewCurso" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header headerRegister"  style="background-color:#6ABD51; color:white;">
        <h5 class="modal-title" id="titleModal">Datos del los cursos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-hover table-bordered">
          <tbody>
          <tr>
            <td>Código del curso</td>
            <td id="id"></td>   
          </tr>    
          <tr>
            <td>Nombre del curso</td>
            <td id="nombre"></td> 
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