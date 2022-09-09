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
            <div class="tile-body">Historial de reportes</div>
          </div>
        </div>
      </div>
    </main>


    <?php footerAdmin($data); ?>    