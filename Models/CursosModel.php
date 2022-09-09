<?php
    class CursosModel extends Mysql
    {
        private $intCodigo;
        private $strNombre;
        private $strToken;

        public function __construct()
        {
            /* all here */
            parent::__construct();
        }
        public function insertCurso(int $codigo, string $nombre){
            $this->intCodigo = $codigo; 
            $this->strNombre = $nombre;
            $sql = "SELECT * FROM curso WHERE id = $this->intCodigo OR nombreCurso='{$this->strNombre}'";
            $request = $this->select_all($sql);
            if(empty($request)){
                $query_insert = "INSERT INTO curso(id,nombreCurso) VALUES(?,?)";
                $arrData = array($this->intCodigo, $this->strNombre);
                $request_insert = $this->insert($query_insert,$arrData);
                $return = $request_insert;
            }else{
                $return = "exist";
            }
            return $return;
        }

        public function selectCursos(){
            $sql="SELECT * FROM curso;";
            $request = $this->select_all($sql);

            return $request;
        }

        public function selectCurso(int $id){
            $this->intCodigo = $id;
            $sql="SELECT id, nombreCurso FROM curso
                  WHERE id =$this->intCodigo";
            $request = $this->select($sql);

            return $request;
        }
        public function updateCurso(int $id, string $nombre){
            $this->intCodigo = $id;
            $this->strNombre = $nombre;
            $sql="UPDATE curso SET nombreCurso=? WHERE id = $this->intCodigo";
                    
            $arrData =array($this->strNombre);      
            $request = $this->update($sql,$arrData);
        
            return $request;
        }

        public function deleteCurso($id){
            $this->intCodigo = $id;
            $sql="DELETE FROM curso WHERE id = $this->intCodigo";
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