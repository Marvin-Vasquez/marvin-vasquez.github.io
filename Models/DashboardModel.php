<?php
    class DashboardModel extends Mysql
    {
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
            GROUP BY c.nombreCurso ORDER BY r.idCurso DESC limit 1";
            
            $request = $this->select_all($sql);

            return $request;
        }
        public function selectCursoMasReporte(){
            $sql="SELECT c.nombreCurso as curso, COUNT(r.idCurso) FROM record r INNER JOIN curso c ON r.idCurso = c.id 
            GROUP BY c.nombreCurso ORDER BY r.idCurso ASC limit 1";
            
            $request = $this->select_all($sql);

            return $request;
        }
    }

?>