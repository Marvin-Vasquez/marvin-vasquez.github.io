<?php
    class NotificarModel extends Mysql
    {
        public function __construct()
        {
            /* all here */
            parent::__construct();
        }
       public function infoReportes(){
        $sql="SELECT e.carnet, e.apellido, e.nombre, g.nombreNivel as grado FROM record r INNER JOIN estudiante e ON r.carnetEstudiante = e.carnet 
              INNER JOIN curso c ON c.id= r.idCurso INNER JOIN nivel g ON g.id = r.idGrado GROUP BY r.carnetEstudiante HAVING COUNT(*)>=3";
        
        $request = $this->select_all($sql);

        return $request;
       }

    }

?>