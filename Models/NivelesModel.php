<?php
    class NivelesModel extends Mysql
    {
        public function __construct()
        {
            /* all here */
            parent::__construct();
        }
        public function selectNiveles()
        {
            // Extraer nivel
            $sql="SELECT * FROM nivel";
            $request = $this->select_all($sql);
            return $request;
        }
    }

?>





