<?php
    class Notificar extends Controllers{
        public function __construct()
        {
            //sessionStart();
            session_start();
            parent::__construct();
            //session_start();
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'login');
			}
			//getPermisos(2);
        }
         /*
      public function Notificar()
      {
          
          $data['page_tag']="Notificar reportes";
          $data['page_title']="notificar";
          $data['page_name']="notificar";
          $data['page_functions_js']="functions_notificar.js";
          $this->views->getView($this,"notificar",$data);
      } */
        public function notificar(){
             
            $data['page_tag']="Notificar correos";
            $data['page_title']="Notificar";
            $data['page_name']="notificar";
            $data['page_functions_js']="functions_notificar.js";
              
            $this->views->getView($this,"notificar",$data);
        }
        public function enviarCorreo()
        {
            echo "Hola";
            /* all here*/
           
        }
      
   
    }

?>