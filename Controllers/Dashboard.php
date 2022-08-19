<?php
    class Dashboard extends Controllers{
        public function __construct()
        {
            parent::__construct();
        }
        public function dashboard()
        {
            /* all here*/
            $data['page_id']=2;
            $data['page_tag']="Control de reportes";
            $data['page_title']="Control de reportes";
            $data['page_name']="panel";
              
            $this->views->getView($this,"dashboard",$data);
        }
      
   
    }

?>