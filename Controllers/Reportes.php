<?php
    class Reportes extends Controllers{
        public function __construct()
        {
            sessionStart();
            parent::__construct();
            //session_start();
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'login');
			}
			//getPermisos(2);
        }
        public function reportes()
        {
            /* all here*/
            $data['page_tag']="Ingresar reportes";
            $data['page_title']="reportes";
            $data['page_name']="reportes";
            $data['page_functions_js']="functions_reportes.js";
            $this->views->getView($this,"reportes",$data);
        }

        public function setReporte(){
            if($_POST){
               
                $idGrado = strClean($_POST['txtGrado']);
                $idCurso = strClean($_POST['txtCurso']);
                $carnet = intval($_POST['carnet']);
                $strMotivo = strClean($_POST['txtMotivo']);
                $strPlan = strClean($_POST['txtPlan']);
                //agregar reporte
                $request_reporte = $this->model->insertReporte($idGrado,$idCurso, $carnet, $strMotivo, $strPlan);
            
               if($request_reporte >= 0){
                    $arrResponse = array("status" => true, "msg" => "almacenado");
                }else{
                    $arrResponse = array("status" => false, "msg" => "no almacenado");
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
             
            die();
        }
      
    }

?>