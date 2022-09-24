<?php
    class LoginModel extends Mysql
    {
        private $intIdUsuario;
        private $strUsuario;
        private $strPassword;
        private $strCorreo;
        private $strToken;


        public function __construct()
        {
            /* all here */
            parent::__construct();
        }
       

        public function login(string $usuario, string $password){
            $this->strUsuario = $usuario;
            $this->strPassword = $password;

            $sql = "SELECT id, nombre, apellido, username, tipo_rol from usuario 
                    WHERE username ='$this->strUsuario' AND password ='$this->strPassword'";
            

            $request = $this->select($sql);

            return $request;
        }
        public function sessionLogin(int $id){
            $this->intIdUsuario = $id;
            
            $sql ="SELECT p.id,p.nombre,p.apellido,p.username,p.correo, p.tipo_rol, r.tipo
                  FROM usuario p INNER JOIN roles r ON p.tipo_rol =r.id WHERE p.id = $this->intIdUsuario";
            
            $request = $this->select($sql);
            $_SESSION['userData'] = $request;
            return $request;
        }

        public function getUserEmail(string $correo){
            $this->strCorreo = $correo;
            $sql = "SELECT id, nombre, apellido FROM usuario
                    WHERE correo ='$this->strCorreo'";
            $request = $this->select($sql);

            return $request;
        }

        public function setTokenUser(int $id, string $tok){
            $this->intIdUsuario =$id;
            $this->strToken =$tok;
            $sql ="UPDATE usuario set token = ?
                   WHERE id=$this->intIdUsuario";
            $arrData = array($this->strToken);
            $request =$this->update($sql,$arrData);
            
            return $request;
        }  
        
        public function getUsuario(string $correo, string $tok){
            $this->strCorreo = $correo;
            $this->strToken = $tok;
            $sql = "SELECT id FROM usuario
            WHERE correo ='$this->strCorreo' and token = '$this->strToken'";
            $request =$this->select($sql);
            return $request;
        }
        
        public function insertPassword(int $Id, string $password){
            
            $this->intIdUsuario = $Id;
            $this->strPassword = $password;        
            $sql = "UPDATE usuario SET password = ?, token = ? WHERE id = $this->intIdUsuario";
    
            $arrData = array($this->strPassword,"");
            
            $request = $this->update($sql,$arrData);
            
          
            return $request;
        }
    }

?>