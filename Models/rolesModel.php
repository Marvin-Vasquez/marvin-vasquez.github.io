<?php
    class rolesModel extends Mysql
    {
        public function __construct()
        {
            /* all here */
            parent::__construct();
        }
        public function selectRoles()
        {
            // Extraer roles
            $sql="SELECT *FROM roles";
            $request = $this->select_all($sql);
            return $request;
        }
       

    }

?>