<?php
    class Record extends Controllers{
        public function __construct()
        {
            parent::__construct();
        }
        public function Record()
        {
            /* all here*/
            $data['page_tag']="Récord Académico";
            $data['page_title']="Récord Académico";
            $data['page_name']="record";
              
            $this->views->getView($this,"record",$data);
        }
      
   
    }

?>