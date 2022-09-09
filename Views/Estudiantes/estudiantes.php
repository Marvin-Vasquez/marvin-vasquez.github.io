<?php 
    headerAdmin($data); 
    getModal('modalEstudiantes',$data);
?>    
<main class="app-content">
      <div class="app-title">
        <div>
            <h1>
            <i class="fa-solid fa-user-graduate"></i> <?= $data['page_title'];?>
                <button class="btn btn-primary" type="button" onclick="openModal();" style="background-color: #198B09;"><i class="fa-solid fa-circle-plus"></i> Nuevo</button>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="estudiantes">Estudiantes</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tableEstudiantes">
                  <thead>
                    <tr>
                      <th>Carnet</th>
                      <th>Nombre</th>
                      <th>Apellidos</th>
                      <th>Grado</th>
                      <th>Sección</th>
                      <th>Acciones</th>
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



    </main>


    <?php footerAdmin($data); ?>    