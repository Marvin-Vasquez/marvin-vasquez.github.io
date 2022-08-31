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
      
   
    }

?>