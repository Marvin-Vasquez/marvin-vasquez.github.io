<?php
    class RecordModel extends Mysql
    {
        private $filtroCarnet;
        public function __construct()
        {
            /* all here */
            parent::__construct();
        }
        public function selectRecord(){
            
            $sql ="SELECT u.nombreUnidad, e.apellido, e.nombre, e.carnet, c.nombreCurso, g.nombreNivel, r.motivoReporte, r.planMejora, r.fechaReporte
                   FROM unidad u INNER JOIN record r ON u.id = r.idUnidad  INNER JOIN estudiante e ON e.carnet = r.carnetEstudiante
                   INNER JOIN curso c ON c.id = r.idCurso  INNER JOIN nivel g ON g.id = r.idGrado";

            $request = $this->select_all($sql);

            return $request;
        }
        public function selectReportes(){
            $sql="SELECT DISTINCT r.carnet, e.apellido, e.nombre, e.correoEncargado,  g.nombreNivel, r.fechaReporte FROM reportediario r 
            INNER JOIN estudiante e ON r.carnet = e.carnet INNER JOIN nivel g ON r.idGrado = g.id;";
            /*$sql ="SELECT r.correlativo, e.carnet, e.apellido, e.nombre, g.nombreNivel,  c.nombreCurso,  r.motivoReporte, r.planMejora, r.fechaReporte
                   FROM reportediario r INNER JOIN estudiante e ON e.carnet = r.carnet  INNER JOIN nivel g ON g.id = r.idGrado
                   INNER JOIN curso c ON c.id = r.idCurso";*/
            
            $request = $this->select_all($sql);

            return $request;
        }
        public function selectDatosReportes($carnet){
            $this->filtroCarnet = $carnet;

            $sql="SELECT c.nombreCurso, r.motivoReporte, r.planMejora FROM reportediario r 
            INNER JOIN curso c ON r.idCurso = c.id INNER JOIN estudiante e ON r.carnet = e.carnet WHERE r.carnet = $this->filtroCarnet;";
            $request = $this->select_all($sql);

            return $request;
        }
        public function getReportesEstudiantes($carnet){
            $this->filtroCarnet = $carnet;
            $sqlEstudiante="SELECT DISTINCT r.carnet, e.apellido, e.nombre, e.correoEncargado,  g.nombreNivel, r.fechaReporte FROM reportediario r 
                            INNER JOIN estudiante e ON r.carnet = e.carnet INNER JOIN nivel g ON r.idGrado = g.id
                            WHERE r.carnet = $this->filtroCarnet";

            $requestEstudiante = $this->select($sqlEstudiante);

            if(count($requestEstudiante)>0){
                $sqlReporte="SELECT c.nombreCurso, r.motivoReporte, r.planMejora FROM reportediario r 
                             INNER JOIN curso c ON r.idCurso = c.id INNER JOIN estudiante e ON r.carnet = e.carnet WHERE r.carnet = $this->filtroCarnet;";
            
                $requestReporte = $this->select_all($sqlReporte);

                $request = array('estudiante'=>$requestEstudiante, 'reporte'=>$requestReporte);
            }

            

            return $request;
        }

    }

?>