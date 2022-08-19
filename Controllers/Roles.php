<?php
    class Roles extends Controllers{
        public function __construct()
        {
            parent::__construct();
        }
        public function Roles()
        {
            /* all here*/
            $data['page_id']=3;
            $data['page_tag']="Roles de usuario";
            $data['page_title']="Roles de usuarios";
            $data['page_name']="rol_usurio";
              
            $this->views->getView($this,"roles",$data);
        }
        public function getRoles()
        {
            /*all here */
            $arrData = $this->model->selectRoles();

            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
            //dep($arrData);
        }
   
    }

?>