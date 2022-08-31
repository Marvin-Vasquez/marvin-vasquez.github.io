<?php
    class Roles extends Controllers{
        public function __construct()
        {
            parent::__construct();
        }
        public function Roles()
        {
            /* all here*/
            $data['page_id']=3;
            $data['page_tag']="Roles de usuario";
            $data['page_title']="Roles de usuarios";
            $data['page_name']="rol_usurio";
              
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
                    <button class="btn btn-primary btn-sm btnEditarRol" rl="'.$arrData[$i]['id'].'" title="Editar" onclick="fntEditRol();"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger btn-sm btnDelRol" rl="'.$arrData[$i]['id'].'" title="Eliminar"><i class="far fa-trash-alt"></i></button>
                </div>'; 
                
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
            //dep($arrData);
        }
        public function getRol(int $idRol)
        {
            $intIdrol = intval(strClean($idRol));
            if($intIdrol > 0)
            {
                $arrData = $this->model->selectRol($intIdrol);
                if(empty($arrData))
                {
                    $arrResponse = array('status' => false, 'msg' => 'Datos no encontrado.');

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
            $strDescripcion =$_POST['txtDescripcion'];
            $Tipo = $_POST['listTipo'];
            $request_rol = $this->model->insertRol($strDescripcion,$Tipo);

            if($request_rol > 0)
            {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');

            }else if($request_rol === "exist")
            {
                $arrResponse = array('status' => false, 'msg' => '¡Atención! El Rol ya existe.');
            }else{
                $arrResponse = array('status' => false, 'msg' => 'Los datos no fueron almacenados.');
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            die();
        }
   
    }

?>