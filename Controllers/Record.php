<?php
    class Record extends Controllers{
      public function __construct()
      {
        session_start();
        //sessionStart();
        parent::__construct();
        //session_start();
			  if(empty($_SESSION['login']))
			  {
				  header('Location: '.base_url().'login');
		  	}
      }
      public function Record()
      {
            /* all here*/
        $data['page_tag']="Récord Académico";
        $data['page_title']="Récord Académico";
        $data['page_name']="record";
        $data['page_functions_js']="functions_record.js";
        $this->views->getView($this,"record",$data);
      }
      
      public function getRecords(){
        $arrData = $this->model->selectRecord();
        //dep($arrData);
        //exit;
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
  
        die();
      }
      public function getReportes(){
        $arrData = $this->model->selectReportes();
        for($i=0; $i<count($arrData);$i++){
          $arrData[$i]['options']='<div class="text-center">  
                  <button type="button" class="btn btn-secundary btn-sm btnViewReportes" style="background-color: #85929E;" title="Ver reportes" onclick="fntViewReportes('.$arrData[$i]['carnet'].');"><i class="fa-sharp fa-solid fa-eye"></i></button>
                  <button type="button" class="btn btn-primary btn-sm btnNotificarReportes" title="Notificar reportes" onclick="fntNotificarReportes('.$arrData[$i]['carnet'].');"><i class="fa-solid fa-paper-plane"></i></button>
                  
                </div>'; 
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
  
        die();
      }
      public function getDatosReportes(int $idEstudiante){
        $id = intval($idEstudiante);
        
        $arrData = $this->model->selectDatosReportes($id);
        if(empty($arrData))
        {
            $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');

        }else{
            $arrResponse = array('status'=> true, 'data' => $arrData);
        }
        //dep($arrData); 
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);

        die();

      }

      public function reportes_diarios(){
        $data['page_tag']="Reportes diarios";
        $data['page_title']="Reportes diarios";
        $data['page_name']="reportes_diarios";
        $data['page_functions_js']="functions_reportes_diarios.js";
        $this->views->getView($this,"reportes_diarios",$data);
      }
     
      public function enviarCorreo(int $carnet){
        //echo $carnet;
        $arrData = $this->model->getReportesEstudiantes($carnet);
        $mail =getFileReporte("Template/Email/enviar_reporte",$arrData);

        //dep($arrData);
        //echo json_encode($carnet,JSON_UNESCAPED_UNICODE);

        $data['page_tag']="Notificación de reportes";
        $data['page_title']="Notificación de reportes";
        $data['page_name']="notificar";
        $data['page_functions_js']="functions_notificar.js";
        $this->views->getView($this,"notificar",$data);
      }
    }

?>
