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
        //dep($arrData);
        //exit;
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
  
        die();
      }

      public function reportes_diarios(){
        $data['page_tag']="Reportes diarios";
        $data['page_title']="Reportes diarios";
        $data['page_name']="reportes_diarios";
        $data['page_functions_js']="functions_reportes_diarios.js";
        $this->views->getView($this,"reportes_diarios",$data);
      }
     
   
    }

?>