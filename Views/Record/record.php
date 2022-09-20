<?php 
    headerAdmin($data); 
    //getModal('modalRoles',$data);
?>    
<main class="app-content">
      <div class="app-title">
        <div>
            <h1>
                <i class="fa-solid fa-tags"></i> <?= $data['page_title'];?>
             <!--   <button class="btn btn-primary" type="button" onclick="openModal();" style="background-color: #198B09;"><i class="fa-solid fa-circle-plus"></i> Nuevo</button> -->
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         
          </ul>
          <li class="breadcrumb-item"><a href="<?php base_url();?>record">Récord Académico</a></li>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tableRecord">
                  <thead>
                    <tr>
                      <th>Unidad</th>
                      <th>Apellido</th>
                      <th>Nombre</th>
                      <th>Carnet</th>
                      <th>Curso</th>
                      <th>Grado</th>
                      <th>Motivo del reporte</th>
                      <th>Plan de mejora</th>
                      <th>Fecha del reporte</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>      


    <?php footerAdmin($data); ?>    