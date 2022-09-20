<?php
    class RecordModel extends Mysql
    {

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
            
            $sql ="SELECT r.correlativo, e.carnet, e.apellido, e.nombre, g.nombreNivel,  c.nombreCurso,  r.motivoReporte, r.planMejora, r.fechaReporte
                   FROM reportediario r INNER JOIN estudiante e ON e.carnet = r.carnet  INNER JOIN nivel g ON g.id = r.idGrado
                   INNER JOIN curso c ON c.id = r.idCurso";
            
            $request = $this->select_all($sql);

            return $request;
        }


    }

?>