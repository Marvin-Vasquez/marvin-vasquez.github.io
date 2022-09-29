<?php
    class NotificarModel extends Mysql
    {
        private $filtroCarnet;
        public function __construct()
        {
            /* all here */
            parent::__construct();
        }
       public function datos_del_Reporte(int $carnet){
        $this->filtroCarnet = $carnet;

        $sql="SELECT c.nombreCurso, r.motivoReporte, r.planMejora FROM reportediario r 
        INNER JOIN curso c ON r.idCurso = c.id WHERE r.carnet = $this->filtroCarnet;";
        
        $request = $this->select_all($sql);

        return $request;
       }

       public function getDatosEstudiante(){
        $sql="SELECT COUNT(DISTINCT carnet) FROM reportediario";
        $sql ="SELECT DISTINCT r.carnet, e.nombre, e.apellido, e.correoEncargado, g.nombreNivel FROM reportediario r 
               INNER JOIN estudiante e ON r.carnet = e.carnet INNER JOIN nivel g ON r.idGrado = g.id;";
        $datosEstudiante = array('estudiante' => $this->select_all($sql));

        return  $datosEstudiante;
       }

    }

?>