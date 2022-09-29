<?php
    class Roles extends Controllers{
        public function __construct()
        {
            session_start();
           // sessionStart();
            parent::__construct();
            //session_start();
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'login');
			}
			
        }
        public function Roles()
        {
            /* all here*/
            $data['page_id']=3;
            $data['page_tag']="Roles de usuario";
            $data['page_title']="Roles de usuarios";
            $data['page_name']="roles";
            $data['page_functions_js']="functions_roles.js";
            $this->views->getView($this,"roles",$data);
        }
        public function getRoles()
        {
            /*all here */
            $arrData = $this->model->selectRoles();
            for($i=0;$i<count($arrData);$i++){
               /* 
                if($arrData[$i]['status']==1){
                    $arrData[$i]['status']='<span class="badge badge-success">Activo</span>';
                                            <span class="badge badge-success">Success</span>
                }else{
                    $arrData[$i]['status']='<span class="badge badge-danger">Activo</span>';
                                            <span class="badge badge-danger">Danger</span>
                }
                */
                $arrData[$i]['options']='<div class="text-center">  
                    <button type="button" class="btn btn-primary btn-sm btnEditarRol" rl="'.$arrData[$i]['id'].'" title="Editar" onclick="fntEditRol();"><i class="fas fa-pencil-alt"></i></button>
                    <button type="button" class="btn btn-danger btn-sm btnDelRol" rl="'.$arrData[$i]['id'].'" title="Eliminar" onclick="fntDelRol();"><i class="far fa-trash-alt"></i></button>
                </div>'; 
                
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
            //dep($arrData);
        }
        public function getSelectRoles(){
            $htmlOptions ="";
            $arrData =$this->model->selectRoles();
            if(count($arrData)>0){
                for($i=0; $i<count($arrData);$i++){
                    $htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['tipo'].'</option>';
                }
            }
            echo $htmlOptions; 
            die();
        }


        public function getRol(int $idRol)
        {
            $intIdrol = intval(strClean($idRol));
            if($intIdrol > 0)
            {
                $arrData = $this->model->selectRol($intIdrol);
                if(empty($arrData))
                {
                    $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');

                }else{
                    $arrResponse = array('status'=> true, 'data' => $arrData);
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }



        public function setRol()
        {
            //dep($_POST);
            $option=0;
            $intIdRol = intval($_POST['idRol']);
            $strDescripcion = $_POST['txtDescripcion'];
            $Tipo = $_POST['listTipo'];
            
            if($intIdRol == 0){
                //crear rol
                $request_rol = $this->model->insertRol($strDescripcion,$Tipo);
                $option = 1;
            }else{
                //actualizar rol
                $request_rol = $this->model->updateRol($intIdRol,$strDescripcion,$Tipo);
                $option = 2;
            }

            if($request_rol > 0)
            {
                if($option == 1){
                    $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                }else if($option == 2){
                    $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
                }
            }else if($request_rol === "exist")
            {
                $arrResponse = array('status' => false, 'msg' => '¡Atención! El Rol ya existe!.');
            }else{
                $arrResponse = array('status' => false, 'msg' => 'Los datos no fueron almacenados.');
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            die();
        }

        public function delRol(){
            if($_POST){
                $intIdRol = intval($_POST['idRol']);
                $requestDelete = $this->model->deleteRol($intIdRol);
                if($requestDelete == 'ok'){
                    $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Rol'); 
                }else if($requestDelete == 'exist'){
                    $arrResponse = array('status' => false, 'msg' => 'No es posible elminar un Rol asociado a usuarios!');
                }else{
                    $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el rol.');
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }
   
    }

?>