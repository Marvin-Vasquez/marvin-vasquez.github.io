<?php
    class DashboardModel extends Mysql
    {
        private $intCarnet;
        private $cantidadReportes;

        public function __construct()
        {
            /* all here */
            parent::__construct();
        }

        public function selectEstudiantes(){
            $sql="SELECT COUNT(*) as total FROM estudiante";
            
            $request = $this->select_all($sql);

            return $request;
        }
        public function selectCursos(){
            $sql="SELECT COUNT(*) as total FROM curso";
            
            $request = $this->select_all($sql);

            return $request;
        }
        public function selectDocentes(){
            $sql="SELECT COUNT(*) as total FROM usuario WHERE tipo_rol = 2";
            
            $request = $this->select_all($sql);

            return $request;
        }
        public function selectReportesDiarios(){
            $sql="SELECT COUNT(*) as total FROM reportediario";
            
            $request = $this->select_all($sql);

            return $request;
        }
        public function selectCursoMenosReporte(){
            $sql="SELECT c.nombreCurso as curso, COUNT(r.idCurso) FROM record r INNER JOIN curso c ON r.idCurso = c.id 
            GROUP BY c.nombreCurso ORDER BY COUNT(r.idCurso) ASC limit 1";
            
            $request = $this->select_all($sql);

            return $request;
        }
        public function selectCursoMasReporte(){
            $sql="SELECT c.nombreCurso as curso, COUNT(r.idCurso) FROM record r INNER JOIN curso c ON r.idCurso = c.id 
            GROUP BY c.nombreCurso ORDER BY COUNT(r.idCurso) DESC limit 1";
            
            $request = $this->select_all($sql);

            return $request;
        }

        public function selectEstudianteMasReportado(){
            $sql="SELECT DISTINCT e.carnet, e.apellido, e.nombre, g.nombreNivel as grado FROM record r INNER JOIN estudiante e ON r.carnetEstudiante = e.carnet 
                  INNER JOIN curso c ON c.id= r.idCurso INNER JOIN nivel g ON g.id = r.idGrado GROUP BY r.carnetEstudiante HAVING COUNT(*)>=3";
            $request = $this->select_all($sql);

            return $request;
        }
        public function selecthistorialReportes(int $id){
            $this->intCarnet = $id;
            $sql="SELECT c.nombreCurso,r.motivoReporte,r.planMejora,r.fechaReporte FROM record r INNER JOIN curso c ON c.id= r.idCurso 
            WHERE r.carnetEstudiante =$this->intCarnet";
            
            $request = $this->select($sql);

             return $request;
        }
    }

?>