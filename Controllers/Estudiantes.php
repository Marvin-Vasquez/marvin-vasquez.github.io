<?php
    class Estudiantes extends Controllers{
        public function __construct()
        {
            parent::__construct();
        }
        public function Estudiantes()
        {
            /* all here*/
            $data['page_tag']="Estudiantes";
            $data['page_title']="Estudiantes";
            $data['page_name']="estudiantes";
              
            $this->views->getView($this,"estudiantes",$data);
        }
        
        public function setEstudiante(){
            //dep($_POST);
            if($_POST){
                 if(empty($_POST['txtCarnet']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtNombreEncargado']) || 
                    empty($_POST['txtCorreoEncargado']) || empty($_POST['listNiveles'])||  empty($_POST['listSeccion'])){
                     $arrResponse = array ("status" => false, "msg" => "Datos incorrecots.");
                 }else{
                    $tipoOperacion = intval($_POST['TipoOperacion']);
                     $intCarnet = ucwords(strClean($_POST['txtCarnet']));
                     $strNombre = ucwords(strClean($_POST['txtNombre']));
                     $strApellido = ucwords(strClean($_POST['txtApellido']));
                     $strNombreEncargado = strtolower(strClean($_POST['txtNombreEncargado']));
                     $strCorreoEncargado = strtolower(strClean($_POST['txtCorreoEncargado']));
                     $intNivel = intval(strClean($_POST['listNiveles']));
                     $intSeccion = intval(strClean($_POST['listSeccion']));
                    
                     $option = 0;
                     if($tipoOperacion == 1){
                        $request_estudiante = $this->model->insertEstudiante($intCarnet,$strNombre,$strApellido,$strNombreEncargado,$strCorreoEncargado,$intNivel,$intSeccion);
                        $option = 1;
                    }else if($tipoOperacion == 2){
                        $request_estudiante = $this->model->updateEstudiante($intCarnet,$strNombre,$strApellido,$strNombreEncargado,$strCorreoEncargado,$intNivel,$intSeccion);
                        $option = 2;
                    }  

                     if($request_estudiante >= 0){
                        if($option == 1){
                            $arrResponse = array("status" => true, "msg" => "Datos guardados correctamente.");
                        }else if($option == 2){
                            $arrResponse = array("status" => true, "msg" => "Datos actualizados correctamente.");
                        }
                     }else if($request_estudiante === 'exist'){
                         $arrResponse = array("status" => false, "msg" => "!Atención¡ Estudiante ya existe.");
                     }else{
                         $arrResponse = array("status" => false, "msg" => "!Atención¡ No es posible almacenar los datos.");
                     }
                 }
                 echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
 
             }
             
             die();
         }

         public function getEstudiantes()
         {
          $arrData = $this->model->selectEstudiantes();
          for($i=0; $i<count($arrData);$i++){
              $arrData[$i]['options']='<div class="text-center">  
                      <button type="button" class="btn btn-secundary btn-sm btnViewEstudiante" style="background-color: #85929E;" title="Ver Estudiante" onclick="fntViewEstudiante('.$arrData[$i]['carnet'].');"><i class="fa-sharp fa-solid fa-eye"></i></button>
                      <button type="button" class="btn btn-primary btn-sm btnEditarEstudiante" title="Editar Estudiante" onclick="fntEditEstudiante('.$arrData[$i]['carnet'].');"><i class="fas fa-pencil-alt"></i></button>
                      <button type="button" class="btn btn-danger btn-sm btnDelEstudiante" title="Eliminar Estudiante" onclick="fntDelEstudiante('.$arrData[$i]['carnet'].');"><i class="far fa-trash-alt"></i></button>
                  </div>'; 
          }
          echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
          //dep($arrData);
          die();
         }
        public function getEstudiante(int $idEstudiante)
        {
            $id = intval($idEstudiante);
        
            $arrData = $this->model->selectEstudiante($id);
            if(empty($arrData))
            {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');

            }else{
                $arrResponse = array('status'=> true, 'data' => $arrData);
            }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);

            //echo $idUsuario;
            die();
        }

        public function delEstudiante(){
            if($_POST){
                $IdEstudiante = intval($_POST['idEstudiante']);
                $requestDelete = $this->model->deleteEstudiante($IdEstudiante);
                if($requestDelete == 'ok'){
                    $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado al estudiante'); 
                }else{
                    $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el estudiante.');
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }
   
    }

?>