<?php
    class Dashboard extends Controllers{

        public function __construct()
        {
            session_start();
            //sessionStart();
            parent::__construct();
            //session_start();
			//session_regenerate_id(true);
			if(empty($_SESSION['login']))
			{
                header('Location: '.base_url().'login');
			}
        }
        public function dashboard()
        {
            /* all here*/
            $data['page_info']="Control de reportes";
            $data['page_tag']="Control de reportes";
           if($_SESSION['tipo_usuario']=="1"){
                $data['page_title']="Panel administrativo";
           }else if($_SESSION['tipo_usuario'] == "2"){
            $data['page_title']="Emitir reportes";
           }else if($_SESSION['tipo_usuario'] == "3"){
                $data['page_title']="Panel de docente auxiliar";
                
           }
            
            $data['page_name']="panel";
            $data['page_functions_js']="functions_dashboard.js"; 
            $this->views->getView($this,"dashboard",$data);
        }
      
        public function totalEstudiantes(){
            $arrData = $this->model->selectEstudiantes();
            $htmlOptions = '<b>'.$arrData[0]['total'].'</b>';
            echo $htmlOptions; 
            
            die();
        }
        
        public function totalDocentes(){
            $arrData = $this->model->selectDocentes();
            $htmlOptions = '<b>'.$arrData[0]['total'].'</b>';
            echo $htmlOptions; 
            
            die();
        }
        public function totalCursos(){
            $arrData = $this->model->selectCursos();
            $htmlOptions = '<b>'.$arrData[0]['total'].'</b>';
            echo $htmlOptions; 
            
            die();
        }
        public function totalReportes(){
            $arrData = $this->model->selectReportesDiarios();
            $htmlOptions = '<b>'.$arrData[0]['total'].'</b>';
            echo $htmlOptions;
            
            die();
        }
        public function cursoMas(){
            $arrData = $this->model->selectCursoMasReporte();
            $htmlOptions = '<b>'.$arrData[0]['curso'].'</b>';
            echo $htmlOptions;
           // echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            //dep($arrData);
            die();
        }
        public function cursoMenos(){
            $arrData = $this->model->selectCursoMenosReporte();
            $htmlOptions = '<b>'.$arrData[0]['curso'].'</b>';
            echo $htmlOptions;
            //echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            //dep($arrData);
            die();
        }
        public function getEstudianteRiesgo(){
            $arrData = $this->model->selectEstudianteMasReportado();
            for($i=0; $i<count($arrData);$i++){
                $arrData[$i]['options']='<div class="text-center">  
                        <button type="button" class="btn btn-secundary btn-sm btnViewEstudiante" style="background-color: #85929E;" title="Ver Estudiante" onclick="fntViewEstudiante('.$arrData[$i]['carnet'].');"><i class="fa-sharp fa-solid fa-eye"></i></button>
                    </div>'; 
            }
            //dep($arrData);
            //exit;
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
      
            die();
        }
    }

?>