<?php 
    headerAdmin($data); 
    //getModal('modalRoles',$data);
?>    
<main class="app-content">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Enviar notificaciones</h3>
            <div class="tile-body">
                <form class="row" id="formNotificar" name="formNotificar" method="POST">
                    <div class="form-group col-md-3">
                        <label class="control-label">Saludo</label>
                        <textarea class="form-control" rows="8" id="txtSaludo" name="txtSaludo"></textarea>
                    </div>
                    <div class="form-group col-md-4 align-self-end">
                    <a title="notificar" href="" target="_blank"></a>   
                    <!-- <button class="btn btn-primary" type="submit" >-->
                        <a href="<?= base_url();?>Views/Template/Email/enviar_reporte.php" class="btn btn-primary" style="background: #92F54E; border-color:#92F54E;">
                        <i class="fa fa-fw fa-lg fa-check-circle"></i> Enviar correos</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php footerAdmin($data); ?>    