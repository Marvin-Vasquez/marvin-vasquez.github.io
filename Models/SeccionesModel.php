<?php
    class SeccionesModel extends Mysql
    {
        public function __construct()
        {
            /* all here */
            parent::__construct();
        }
        public function selectSecciones()
        {
            // Extraer nivel
            $sql="SELECT * FROM seccion";
            $request = $this->select_all($sql);
            return $request;
        }
    }

?>