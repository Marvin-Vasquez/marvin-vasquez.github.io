<!-- Modal -->
<div class="modal fade" id="modalFormRol" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister"  style="background-color:#6ABD51; color:white;">
        <h5 class="modal-title" id="titleModal">Nuevo Rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST" class="form-register" id="formRol" name="formRol">
          <input type="hidden" id="idRol" name="idRol" value="">
            <div class="contenedor-inputs">
                <label class="form-label">Tipo de rol</label>
                <select id="listTipo" name="listTipo" class="select-box">
                  <option value=""></option>
                  <option value="1">Administrador</option>
					        <option value="2">Docente</option>
                  <option value="3">Auxiliar</option>
			          </select>
                
			          <textarea rows="6" cols="10" id="txtDescripcion" name="txtDescripcion" class="form-textarea" placeholder="Descripción del rol"></textarea>
            </div>
            <div class="tile-footer">
                <button id="btnActionForm"class="btn btn-primary" style="background-color: #198B09;" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>
                &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" style="background-color: #198B09;" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>
            
        </form>  
      </div>
    </div>
  </div>
</div>