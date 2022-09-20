<?php
    class Dashboard extends Controllers{

        public function __construct()
        {
            sessionStart();
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
            $data['page_info']="Estudiantes en riesgo";
            $data['page_tag']="Estadísticas";
            $data['page_title']="Estadísticas";
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
    }

?>