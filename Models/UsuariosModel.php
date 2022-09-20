
<?php
    class UsuariosModel extends Mysql
    {
        private $intIdUsuario;
        private $strNombre;
        private $strApellido;
        private $strNombreUsuario;
        private $strCorreo;
        private $strPassword;
        private $intTipoUsuario;
        private $strToken;

        public function __construct()
        {
            /* all here */
            parent::__construct();
        }
       
        public function insertUsuario(string $Nombre, string $Apellido, string $NombreUsuario, string $Correo, string $Password, int $TipoUsuario){
            $this->strNombre = $Nombre;
            $this->strApellido = $Apellido;
            $this->strNombreUsuario = $NombreUsuario;
            $this->strCorreo = $Correo;
            $this->strPassword = $Password;
            $this->intTipoUsuario = $TipoUsuario;

            $sql = "SELECT * FROM usuario WHERE nombre= '{$this->strNombre}' OR apellido = '{$this->strApellido}' OR correo = '{$this->strCorreo}'";
            $request = $this->select_all($sql);
            if(empty($request)){
                $query_insert = "INSERT INTO usuario(nombre,apellido,username,correo,password,tipo_rol) VALUES(?,?,?,?,?,?)";
                $arrData = array($this->strNombre, $this->strApellido, $this->strNombreUsuario, $this->strCorreo,
                                 $this->strPassword,$this->intTipoUsuario);
                $request_insert = $this->insert($query_insert,$arrData);
                
                $return = $request_insert;
            }else{
                $return = "exist";
            }
            return $return;
        }
        public function selectUsuarios(){
            $whereAdmin = "";
            if($_SESSION['idUsuario'] != 1){
                $whereAdmin = " AND u.id != 1";
            }
            $sql="SELECT u.id, u.nombre, u.apellido, u.username, u.correo, r.tipo 
                  FROM usuario u INNER JOIN roles r ON u.tipo_rol = r.id".$whereAdmin;
            $request = $this->select_all($sql);

            return $request;
        }

        public function selectUsuario(int $id){
            $this->intIdUsuario =$id;
            $sql="SELECT u.id, u.nombre, u.apellido, u.username, u.correo, r.tipo 
                  FROM usuario u INNER JOIN roles r ON u.tipo_rol = r.id
                  WHERE u.id =$this->intIdUsuario";
            $request = $this->select($sql);

            return $request;

        }
        public function updateUsuario(int $id, string $Nombre, string $Apellido, string $NombreUsuario, string $Correo, string $Password, int $TipoUsuario){
            $this->intIdUsuario = $id;
            $this->strNombre = $Nombre;
            $this->strApellido = $Apellido;
            $this->strNombreUsuario = $NombreUsuario;
            $this->strCorreo = $Correo;
            $this->strPassword = $Password;
            $this->intTipoUsuario = $TipoUsuario;

            /*$sql = "SELECT * FROM usuario WHERE (nombre = '{$this->strNombre}' OR correo = '{$this->strCorreo}') 
                    AND id != $this->intIdUsuario";
            $request =$this->select_all($sql);*/

            $sql="UPDATE usuario SET nombre=?, apellido=?, username=?, correo=?, password=?,
                    tipo_rol=? WHERE id = $this->intIdUsuario";
                    
            $arrData =array($this->strNombre, $this->strApellido, $this->strNombreUsuario,
                                    $this->strCorreo, $this->strPassword, $this->intTipoUsuario);      
            $request = $this->update($sql,$arrData);
        
            return $request;
        }
        public function deleteUsuario(int $idUsuario){
            $this->intIdUsuario = $idUsuario;
            $sql="DELETE FROM usuario WHERE id = $this->intIdUsuario";
            $request = $this->delete($sql);
            if($request){
                $request = 'ok';
            }else{
                $request = 'error';
            }
            return $request;
        }

        public function updatePerfil(int $id, string $Nombre, string $Apellido, string $NombreUsuario, string $Correo, string $Password)
        {
            $this->intIdUsuario = $id;
            $this->strNombre = $Nombre;
            $this->strApellido = $Apellido;
            $this->strNombreUsuario = $NombreUsuario;
            $this->strCorreo = $Correo;
            $this->strPassword = $Password;

            $sql = "UPDATE usuario SET nombre = ?, apellido = ?, username = ?, correo = ?, password = ?
                   WHERE id = $this->intIdUsuario";
            $arrData = array($this->strNombre, $this->strApellido, $this->strNombreUsuario, $this->strCorreo, $this->strPassword); 
            $request = $this->update($sql,$arrData);

            return $request;
        }
    }

?>



