<?php
    class Usuarios extends Controllers{
        public function __construct()
        {
            parent::__construct();
        }
        public function usuarios()
        {
            /* all here*/
            $data['page_id']=2;
            $data['page_tag']="Usuarios del sistema";
            $data['page_title']="Usuarios";
            $data['page_name']="usuarios";
              
            $this->views->getView($this,"usuarios",$data);
        }
      
   
    }

?>