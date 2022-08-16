<?php
    class Home extends Controllers{
        public function __construct()
        {
            parent::__construct();
        }
        public function home()
        {
            /* all here*/
            $data['page_id']=1;
            $data['page_tag']="Página principal";
            $data['page_title']="Home";
            $data['page_name']="home";
              
            $this->views->getView($this,"home",$data);
        }
      
   
    }

?>