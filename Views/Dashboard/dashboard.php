
<?php headerAdmin($data); ?>

    
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> <?= $data['page_title'];?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
        </ul>
      </div>
      <?php if($_SESSION['userData']['tipo_rol']==1){?>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">Información relevante</div><br><br>
            <div class="row">
            <div class="col-md-3">
              <div class="widget-small primary"><i class="icon fa fa-user-graduate fa-3x"></i>
                <div class="info">
                  <h4>Total de Alumnos</h4>
                  <p id="totalEstudiantes"></p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="widget-small primary"><i class="icon fa fa-book fa-3x"></i>
                <div class="info">
                  <h4>Total de Cursos</h4>
                  <p id="totalCursos"></p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="widget-small primary"><i class="icon fa fa-chalkboard-user fa-3x"></i><i class="fa-solid "></i>
                <div class="info">
                  <h4>Total de Docentes</h4>
                  <p id="totalDocentes"></p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="widget-small warning"><i class="icon fa fa-clock fa-3x"></i>
                <div class="info">
                  <h4>Reportes al momento</h4>
                  <p id="totalReportesDiarios"></p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
            <div class="widget-small danger"><i class="icon fa fa-arrow-trend-up fa-3x"></i>
                <div class="info">
                  <h4>Curso con más reportes</h4>
                  <p id="cursoMasReportado"></p>
                </div>
              </div>
            </div>
            <div class="col-md-3" sytle="background:green;">
              <div class="widget-small info coloured-icon"><i class="icon fa fa-arrow-trend-down fa-3x"></i>
                <div class="info" sytle="background:green;">
                  <h4 sytle="background:green;">Curso con menos reportes</h4>
                  <p id="cursoMenosReportado"></p>
                </div>
              </div>
          </div>
          </div>
        </div>
        <br><br>
        <div class="app-title">
        <div>
            <h1>
              <i class="fa-solid fa-magnifying-glass-chart"></i> <?= $data['page_info'];?>
            </h1>
        </div>
      </div>
      <div class="row">
      
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tableEstudianteRiesgo">
                  <thead>
                    <tr>
                      <th>Carnet</th>
                      <th>Apellido</th>
                      <th>Nombre</th>
                      <th>Grado</th>
                      <th>Opciones</th>
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
    </div>
      
      <?php } ?>
</main>


    <?php footerAdmin($data); ?>       

