<?php
    class Cursos extends Controllers{
        public function __construct()
        {
            parent::__construct();
        }
        public function Cursos()
        {
            /* all here*/
            $data['page_tag']="Cursos ciclo básico";
            $data['page_title']="Cursos de nivel básico";
            $data['page_name']="cursos";
              
            $this->views->getView($this,"cursos",$data);
        }
      
   
    }

?>