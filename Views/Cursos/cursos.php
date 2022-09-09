<?php 
    headerAdmin($data); 
    getModal('modalCursos',$data);
?>    
<main class="app-content">
      <div class="app-title">
        <div>
            <h1>
                <i class="fa-solid fa-book-open-reader"></i><?= $data['page_title'];?>
                <button class="btn btn-primary" type="button" onclick="openModal();" style="background-color: #198B09;"><i class="fa-solid fa-circle-plus"></i> Nuevo</button>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          
         <li class="breadcrumb-item"><a href="cursos"> Cursos</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tableCursos">
                  <thead>
                    <tr>
                      <th>Código de curso</th>
                      <th>Nombre del curso</th>
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