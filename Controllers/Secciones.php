<?php
    class Secciones extends Controllers{
        public function __construct()
        {
            parent::__construct();
        }
        public function seccion()
        {
            /* all here*/
            $data['page_tag']="Niveles";
            $data['page_title']="Niveles";
            $data['page_name']="niveles";  
            //$this->views->getView($this,"nivel",$data);
        }
        public function getSelectSecciones(){
            $htmlOptions ="";
            $arrData =$this->model->selectSecciones();
            if(count($arrData)>0){
                for($i=0; $i<count($arrData);$i++){
                    $htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['nombreSeccion'].'</option>';
                }
            }
            echo $htmlOptions; 
            die();
        }
    }

?>