<?php 
    headerAdmin($data); 
    //getModal('modalCursos',$data);
?>  

<main class="app-content" style="background: #1B7015;">
      <div class="row">
        <div class="col-md-10">
          <div class="tile">
            <img class="img-form" src="<?= media();?>/img/logo_itc.jpg" style="width: 120px; height: 120px;  position: absolute; top: 2px;">
            <div style="width: auto; height:110px"></div>
            <h3 class="tile-title">Reportes académicos</h3>
            <div style="width: auto; height:5px; background: #A5A73C;"></div>
            <div class="tile-body">
              <form  id="formReporte" name="formReporte" action="">
                <input type="hidden" id="carnet" name="carnet" value="0">
                <input type="hidden" id="seccion" name="seccion" value="0">
                <div class="form-group">
                  <label class="control-label">Grado</label>
                  <select class="form-control" id="txtGrado" name="txtGrado" onchange="grado(this)">
                
                  </select>
                  <div class="form-group">
                  <label class="control-label">Sección</label>
                  <select class="form-control" id="txtSección" name="txtSeccion" onchange="seccionElegida(this)">
                    <option value="0"></option>
                    <option value="1">A</option>
                    <option value="2">B</option>
                    
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Curso</label>
                  <select class="form-control" id="txtCurso" name="txtCurso">
                    <option></option>
                  
                  </select>
                </div>
                <div class="form-group">
                    <div style="float:left; width:40%;">
                        <label for="estudiantes">Estudiantes del grado</label>
                        <select class="form-control"  style="height:200px;" id="listEstudiantes" name="listEstudiantes" multiple="" >
                      
                        </select>
                    </div>
                    <div style="float:left; width:20%; text-align: center;">
                        <div style="width: 100%;">
                            <button class="btn btn-primary" style="background: #92F54E; border-color:#92F54E; width:50%; margin-top:20px;" type="button" id="agregar"><i class="fa-solid fa-caret-right"></i> Agregar</button>
                        </div>
                        <div style="width: 100%; height:30px"></div>

                        <div style="width: 100%;">
                            <button class="btn btn-primary" style="background: #92F54E; border-color:#92F54E; width:50%; margin-bottom:40px;" type="button" id="quitar"><i class="fa-solid fa-caret-left"></i> Quitar</button>
                        </div>
                    </div>
                    <div style="float:right; width:40%;">
                        <label for="estudiantes_reportados">Estudiantes reportados</label>
                        <select class="form-control" style="height:200px;" id="listEstudiantesReportados" name="listEstudiantesReportados" multiple="">
                          
                        </select>
                    </div>
                </div>
                <div style="width: 100%; height:280px;"></div>
                <div class="form-group">
                  <label class="control-label">Motivo del reporte</label>
                  <textarea class="form-control" rows="4" placeholder="Cual es el motivo del reporte" id="txtMotivo" name="txtMotivo"></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label">Plan de mejoramiento</label>
                  <textarea class="form-control" rows="4" placeholder="Si el estudiante tendra oportunidad de mejora" id="txtPlan" name="txtPlan"></textarea>
                </div>
                <div class="tile-footer">
                <button type="submit" class="btn btn-primary" style="background: #92F54E; border-color:#92F54E;"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar Reporte</button>&nbsp;&nbsp;&nbsp;
              
                </div>
              </form>
            </div>
            
          </div>
        </div>
        
    </main>


<?php footerAdmin($data); ?>    