<?php
    class ReportesModel extends Mysql
    {
        private $strGrado;
        private $strCurso;
        private $intIdGrado;
        private $intIdCurso;
        private $strMotivo;
        private $strPlan;
        private $intCarnet;
        private $fecha;
        private $strNombre;
        private $strApellido;

        public function __construct()
        {
            /* all here */
            parent::__construct();
        }
       
        public function selectCurso(string $Curso){
            $this->strCurso = $Curso;
            $sql="SELECT id FROM curso
                  WHERE nombreCurso = '{$this->strCurso}'";
            $request = $this->select($sql);

            return $request;
        }
        public function selectGrado(string $Grado){
            $this->strGrado = $Grado;
            $sql="SELECT id FROM nivel
                  WHERE nombreNivel = '{$this->strGrado}'";
            $request = $this->select($sql);

            return $request;
        }
        public function selectEstudiante(string $nombre, string $apellido){
            $this->strNombre = $nombre;
            $this->strApellido = $apellido;
            $sql="SELECT carnet FROM estudiante
                  WHERE nombre = '{$this->strNombre}' AND apellido = '{$this->strApellido}' ";
            $request = $this->select($sql);

            return $request;
        }
        public function insertReporte(int $idGrado, int $idCurso,  int $carnet, string $motivo, string $plan){
            $fecha = getdate();
            $dia =$fecha["mday"];
            $mes = $fecha["mon"];
            $anio = $fecha["year"];
            $fechaReporte =$anio."-".$mes."-".$dia;
            
            $this->intIdGrado = $idGrado; 
            $this->intIdCurso = $idCurso;
            $this->intCarnet = $carnet;
            $this->strMotivo = $motivo;
            $this->strPlan = $plan;
            $this->fecha = $fechaReporte;

            $query_insert = "INSERT INTO reportediario(idGrado,idCurso,carnet,motivoReporte,planMejora,fechaReporte) VALUES(?,?,?,?,?,?)";
            $arrData = array($this->intIdGrado, $this->intIdCurso, $this->intCarnet, $this->strMotivo, $this->strPlan, $this->fecha);
            $request_insert = $this->insert($query_insert,$arrData);
            $return = $request_insert;
            
            return $return;
        }


    }

?>