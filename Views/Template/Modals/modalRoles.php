<!-- Modal -->
<div class="modal fade" id="modalFormRol" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Nuevo Rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST class="form-register" id="formRol" name="formRol">
            <div class="contenedor-inputs">
                <label class="form-label">Tipo de rol</label>
                <select class="select-box" required>
                  <option value="0"></option>
					        <option value="1">Administrador</option>
					        <option value="2">Docente</option>
			          </select>
                <input type="text"" id="txtNombres" name="txtNombre"class="form-input-100" placeholder="Nombre del rol" required>
			          <textarea rows="6" cols="10" class="form-textarea" placeholder="Descripción del rol" required></textarea>
			          <input type="submit"  value="Guardar"><!--onclick="message()"-->
            </div>
        </form>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #198B09;">Close</button>
        <button type="button" class="btn btn-primary" style="background-color: #198B09;">Save changes</button>
      </div>
    </div>
  </div>
</div>