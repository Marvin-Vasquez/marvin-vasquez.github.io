<?php
    class Niveles extends Controllers{
        public function __construct()
        {
            parent::__construct();
        }
        public function nivel()
        {
            /* all here*/
         
            $data['page_tag']="Niveles";
            $data['page_title']="Niveles";
            $data['page_name']="niveles";  
            //$this->views->getView($this,"nivel",$data);
        }
        public function getSelectNiveles(){
            $htmlOptions ="";
            $arrData =$this->model->selectNiveles();
            if(count($arrData)>0){
                for($i=0; $i<count($arrData);$i++){
                    $htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['nombreNivel'].'</option>';
                }
            }
            echo $htmlOptions; 
            die();
        }
    }

?>