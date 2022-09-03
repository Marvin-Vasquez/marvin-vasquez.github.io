<?php
    class RolesModel extends Mysql
    {
        public $intIdrol;
        public $strTiporol;
        public $strDescripcionrol;
        public function __construct()
        {
            /* all here */
            parent::__construct();
        }
        public function selectRoles()
        {
            // Extraer roles
            $sql="SELECT * FROM roles";
            $request = $this->select_all($sql);
            return $request;
        }
        public function selectRol(int $idRol)
        {
            //buscar rol
            $this->intIdrol=$idRol;
            $sql = "SELECT * FROM roles WHERE id = $this->intIdrol";
            $request = $this->select($sql);
            return $request;
        }

        public function insertRol(string $descripcion, string $tipo)
        {
            $return="";
            $rol="";
            if($tipo === "1")
            {
                $rol="Administrador";

            }else if($tipo === "2")
            {
                $rol="Docente";
            }else if($tipo === "3")
            {
                $rol="Auxiliar";
            }
            $this->strTiporol=$rol;
            $this->strDescripcionrol = $descripcion;
            $sql = "SELECT * FROM roles WHERE tipo = '{$this->strTiporol}';";
            $request = $this->select_all($sql);
            if(empty($request))
            {
                $query_insert = "INSERT INTO roles(tipo,descripcion) values(?,?);";
                $arrData = array($this->strTiporol, $this->strDescripcionrol);
                $request_insert = $this->insert($query_insert, $arrData);
                $return = $request_insert;
            }else
            {
                $return ="exist";
            }
            return $return;
        }

        public function updateRol(int $idRol, string $descripcion, string $tipoRol){
            if($tipoRol === "1")
            {
                $rol="Administrador";

            }else if($tipoRol === "2")
            {
                $rol="Docente";
            }else if($tipoRol === "3")
            {
                $rol="Auxiliar";
            }
            $this->intIdrol = $idRol;
            $this->strTiporol = $rol;
            $this->strDescripcionrol = $descripcion;
            $sql = "SELECT * FROM roles WHERE tipo = '$this->strTiporol' AND id != $this->intIdrol";
            $request = $this->select_all($sql);
            if(empty($request)){
                $sql = "UPDATE roles SET tipo= ?, descripcion=? WHERE id = $this->intIdrol";
                $arrData = array($this->strTiporol,$this->strDescripcionrol);
                $request = $this->update($sql,$arrData);

            }else{
                $request="exist";
            }
            return $request; 
        }
        public function deleteRol(int $idrol){
            $this->intIdrol = $idrol;
            $sql ="SELECT *FROM usuario WHERE tipo_rol = $this->intIdrol";
            $request = $this->select_all($sql);
            if(empty($request)){
                $sql="DELETE FROM roles WHERE id = $this->intIdrol";
                $request = $this->delete($sql);
                if($request){
                    $request = 'ok';
                }else{
                    $request = 'error';
                }
            }else{
                $request = 'exist';
            }
            return $request;
        }
    }

?>