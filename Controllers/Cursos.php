<?php
    class Cursos extends Controllers{
        public function __construct()
        {
            sessionStart();
            parent::__construct();
            //session_start();
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'login');
			}
			//getPermisos(2);
        }
        public function Cursos()
        {
            /* all here*/
            $data['page_tag']="Cursos ciclo básico";
            $data['page_title']="Cursos de nivel básico";
            $data['page_name']="cursos";
            $data['page_functions_js']="functions_cursos.js";
            $this->views->getView($this,"cursos",$data);
        }

        public function setCurso(){
            //dep($_POST);
            if($_POST){
                $intCodigo = intval(strClean($_POST['txtCodigo']));
                $strNombre = ucwords(strClean($_POST['txtNombre']));
                $intTipoOperacion = intval(strClean($_POST['TipoOperacion']));
                $option = 0;
                if($intTipoOperacion == 1){
                    //agregar curso
                    $request_curso = $this->model->insertCurso($intCodigo, $strNombre);
                    $option = 1;
                }else if($intTipoOperacion == 2){
                    //actualizar curso
                    $request_curso = $this->model->updateCurso($intCodigo,$strNombre);
                    $option = 2;
                }
                if($request_curso >= 0){
                    if($option == 1){
                        $arrResponse = array("status" => true, "msg" => "Datos guardados correctamente.");
                    }else if($option == 2){
                        $arrResponse = array("status" => true, "msg" => "Datos actualizados correctamente.");
                    }
                }else if($request_curso == "exist"){
                    $arrResponse = array("status" => false, "msg" => "!Atención¡ curso ya existe.");
                
                }else{
                    $arrResponse = array("status" => false, "msg" => "!Atención¡ No es posible almacenar los datos.");
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
             
             die();
         }

        public function getSelectCursos(){
            $htmlOptions ="";
            $arrData =$this->model->selectCursos();
            if(count($arrData)>0){
                for($i=0; $i<count($arrData);$i++){
                    $htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['nombreCurso'].'</option>';
                }
            }
            echo $htmlOptions; 
            die();
        }

         public function getCursos()
         {
          $arrData = $this->model->selectCursos();
          for($i=0; $i<count($arrData);$i++){
              $arrData[$i]['options']='<div class="text-center">  
                     
                      <button type="button" class="btn btn-primary btn-sm btnEditarCurso" title="Editar Curso" onclick="fntEditCurso('.$arrData[$i]['id'].');"><i class="fas fa-pencil-alt"></i></button>
                      <button type="button" class="btn btn-danger btn-sm btnDelCurso" title="Eliminar Curso" onclick="fntDelCurso('.$arrData[$i]['id'].');"><i class="far fa-trash-alt"></i></button>
                  </div>'; 
          }
          /* <button type="button" class="btn btn-secundary btn-sm btnViewCurso" style="background-color: #85929E;" title="Ver Curso" onclick="fntViewCurso('.$arrData[$i]['id'].');"><i class="fa-sharp fa-solid fa-eye"></i></button> */
          echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
          //dep($arrData);
          die();
         }
      
         public function getCurso(int $idCurso)
        {
            $id = intval($idCurso);
            if($id > 0){
                $arrData = $this->model->selectCurso($id);
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
        
        public function delCurso(){
            if($_POST){
                $IdCurso = intval($_POST['idCurso']);
                $requestDelete = $this->model->deleteCurso($IdCurso);
                if($requestDelete == 'ok'){
                    $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el curso'); 
                }else{
                    $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el curso.');
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }
    }

?>