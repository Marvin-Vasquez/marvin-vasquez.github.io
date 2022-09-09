<?php
    class Usuarios extends Controllers{
        public function __construct()
        {
            parent::__construct();
        }
        public function Usuarios()
        {
            /* all here*/
            $data['page_tag']="Usuarios del sistema";
            $data['page_title']="Usuarios";
            $data['page_name']="usuarios";
              
            $this->views->getView($this,"usuarios",$data);
        }
        
        public function setUsuario(){
           //dep($_POST);
           $option=0;
           
                if(empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtNombreUsuario']) || empty($_POST['txtCorreo']) || empty($_POST['listTipo']))
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{ 
                    $idUsuario = intval($_POST['idUsuario']);
                    $strNombre = ucwords(strClean($_POST['txtNombre']));
                    $strApellido = ucwords(strClean($_POST['txtApellido']));
                    $strNombreUsuario = strtolower(strClean($_POST['txtNombreUsuario']));
                    $strCorreo = strtolower(strClean($_POST['txtCorreo']));
                    $intTipoUsuario = intval(strClean($_POST['listTipo']));
                    //Encriptando contraseña
                    $strPass = strClean($_POST['txtPass']);
                    $strPassword = hash("SHA256",$strPass);
                    if($idUsuario == 0){
                        //crear usuario
                        
                        $request_user = $this->model->insertUsuario($strNombre,$strApellido,
                                                                $strNombreUsuario,$strCorreo,
                                                                $strPassword,$intTipoUsuario);
                        $option = 1;
                    }else{
                        
                        $request_user = $this->model->updateUsuario($idUsuario,$strNombre,
                                                                $strApellido,$strNombreUsuario,
                                                                $strCorreo, $strPassword,
                                                                $intTipoUsuario);
                        $option = 2;
                    }

                    if($request_user > 0){
                        if($option == 1){
                            $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                        }else if($option == 2){
                            $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                        }
                    }else if($request_user == 'exist'){
                        $arrResponse = array('status' => false, 'msg' => '!Atención¡ Nombre o el correo ya existen, ingrese otros datos.');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => '!Atención¡ No es posible almacenar los datos.');
                    }
                } 
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function getUsuarios()
        {
            $arrData = $this->model->selectUsuarios();
            for($i=0; $i<count($arrData);$i++){
                $arrData[$i]['options']='<div class="text-center">  
                   
                    <button type="button" class="btn btn-primary btn-sm btnEditarUsuario" title="Editar Usuario" onclick="fntEditUsuario('.$arrData[$i]['id'].')"><i class="fas fa-pencil-alt"></i></button>
                    <button type="button" class="btn btn-danger btn-sm btnDelUsuario" title="Eliminar Usuario" onclick="fntDelUsuario('.$arrData[$i]['id'].')"><i class="far fa-trash-alt"></i></button>
                </div>'; 
            }
            /* <button type="button" class="btn btn-secundary btn-sm btnViewUsuario" style="background-color: #85929E;" title="Ver Usuario" onclick="fntViewUsuario('.$arrData[$i]['id'].')"><i class="fa-sharp fa-solid fa-eye"></i></button> */
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            //dep($arrData);
            die();
       }
       
       public function getUsuario(int $idUsuario)
       {
            $id = intval($idUsuario);
            if($id > 0){
                $arrData = $this->model->selectUsuario($id);
                if(empty($arrData))
                {
                    $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');

                }else{
                    $arrResponse = array('status'=> true, 'data' => $arrData);
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            //echo $idUsuario;
            die();
       }
       public function delUsuario(){
        if($_POST){
            $IdUsuario = intval($_POST['idUsuario']);
            $requestDelete = $this->model->deleteUsuario($IdUsuario);
            if($requestDelete == 'ok'){
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el usuario'); 
            }else{
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el usuario.');
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
        }

    }

?>