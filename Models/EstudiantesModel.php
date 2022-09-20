<?php
    class EstudiantesModel extends Mysql
    {
        private $intCarnet;
        private $strNombre;
        private $strApellido;
        private $strNombreEncargado;
        private $strCorreoEncargado;
        private $intNivel;
        private $intSeccion;
        private $strToken;

        public function __construct()
        {
            /* all here */
            parent::__construct();
        }
       
        public function insertEstudiante(int $carnet, string $Nombre, string $Apellido, string $NombreEncargado, string $CorreoEncargado, int $idNivel, int $idSeccion){
            $this->intCarnet =$carnet; 
            $this->strNombre = $Nombre;
            $this->strApellido = $Apellido;
            $this->strNombreEncargado = $NombreEncargado;
            $this->strCorreoEncargado = $CorreoEncargado;
            $this->intNivel = $idNivel;
            $this->intSeccion = $idSeccion;

            $sql = "SELECT * FROM estudiante WHERE carnet= $this->intCarnet";
            $request = $this->select_all($sql);
            if(empty($request)){
                $query_insert = "INSERT INTO estudiante(carnet,nombre,apellido,nombreEncargado,correoEncargado,idNivel,idSeccion) VALUES(?,?,?,?,?,?,?)";
                $arrData = array($this->intCarnet, $this->strNombre, $this->strApellido, $this->strNombreEncargado, $this->strCorreoEncargado,
                                 $this->intNivel,$this->intSeccion);
                $request_insert = $this->insert($query_insert,$arrData);
                $return = $request_insert;
            }else{
                $return = "exist";
            }
            return $return;
        }
        public function selectReportsEstudiantes(int $idNivel, int $idSeccion){
            $this->intNivel = $idNivel;
            $this->intSeccion = $idSeccion;
            $sql="SELECT carnet,nombre,apellido FROM estudiante
                  WHERE idNivel = $this->intNivel AND idSeccion = $this->intSeccion
                  ORDER BY apellido ASC;";
            $request = $this->select_all($sql);

            return $request;
        }
        public function selectEstudiantes(){
            $sql="SELECT e.carnet, e.nombre, e.apellido, e.nombreEncargado, e.correoEncargado, n.nombreNivel, s.nombreSeccion 
                  FROM estudiante e INNER JOIN nivel n ON e.idNivel = n.id INNER JOIN seccion s ON  e.idSeccion = s.id;";
            $request = $this->select_all($sql);

            return $request;
        }

        public function selectEstudiante(int $id){
            $this->intCarnet = $id;
            $sql="SELECT e.carnet, e.nombre, e.apellido, e.nombreEncargado, e.correoEncargado, n.nombreNivel, s.nombreSeccion 
            FROM estudiante e INNER JOIN nivel n ON e.idNivel = n.id INNER JOIN seccion s ON  e.idSeccion = s.id
                  WHERE e.carnet =$this->intCarnet";
            $request = $this->select($sql);

            return $request;
        }

        public function updateEstudiante(int $carnet, string $nombre, string $apellido, $encargado, $correo, $idNivel, $idSeccion){
            $this->intCarnet =$carnet; 
            $this->strNombre = $nombre;
            $this->strApellido = $apellido;
            $this->strNombreEncargado = $encargado;
            $this->strCorreoEncargado = $correo;
            $this->intNivel = $idNivel;
            $this->intSeccion = $idSeccion;
            
            $sql="UPDATE estudiante SET carnet =?,nombre=?, apellido=?, nombreEncargado=?, correoEncargado=?,idNivel=?,idSeccion =?  
                  WHERE carnet = $this->intCarnet";
                    
            $arrData =array($this->intCarnet, $this->strNombre, $this->strApellido, $this->strNombreEncargado, $this->strCorreoEncargado,
                            $this->intNivel,$this->intSeccion);      
            $request = $this->update($sql,$arrData);
        
            return $request;
        }

        public function deleteEstudiante($id){
            $this->intCarnet = $id;
            $sql="DELETE FROM estudiante WHERE carnet = $this->intCarnet";
            $request = $this->delete($sql);
            if($request){
                $request = 'ok';
            }else{
                $request = 'error';
            }
            return $request;
        }

    }
?>