<?php
    require_once 'Libraries/Dompdf/autoload.inc.php';
    require 'Libraries/email/vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    use Dompdf\Dompdf;

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
			
        }
        
        public function notificar(){
             
            $data['page_tag']="Notificar correos";
            $data['page_title']="Notificar";
            $data['page_name']="notificar";
            $data['page_functions_js']="functions_notificar.js";
              
            $this->views->getView($this,"notificar",$data);
        }
 
        public function enviarCorreo($carnet)
        {
            echo $carnet;
            /*
            $arrDatosEstudiante = $this->model->getDatosEstudiante();
            $total=count($arrDatosEstudiante['estudiante']);
            $mail = new PHPMailer(true);
            $rutaTemp = BASE_URL."fileReportes/";
            $html ="";
            
            for($i=0;$i<count($arrDatosEstudiante['estudiante']);$i++){
                $carnet = intval($arrDatosEstudiante['estudiante'][$i]['carnet']);
                $arrDatosReportes = $this->model->datos_del_reporte($carnet);
                //dep($arrDatosEstudiante['estudiante'][$i]); 
                $arrDatosEstudiante['estudiante'][$i]['reportes']=$arrDatosReportes;
                
                $dompdf = new Dompdf();
                $options = $dompdf->getOptions();
                $options->set(array('isRemoteEnabled' => true));
                $dompdf->setOptions($options);
                ob_get_clean();

                $dompdf->loadHtml($html);
                $dompdf->setPaper('letter');
                $dompdf->render();
                $output = $dompdf->output();
                $nombreArchivo ="Información reporte".$i.".pdf";
                //$dompdf->stream($nombreArchivo, array("Attachment" => false));
                $archivo=$rutaTemp.$nombreArchivo;
                
                $dompdf->stream($archivo);
                file_put_contents($archivo,$output);
                
            } 
            //dep($arrDatosEstudiante['estudiante'][1]); 
           
                $html=getFileReporte("Template/Modals/reportePDF",$arrDatosEstudiante,1);*/
                
          // return $arrDatosEstudiante;
        }    
    }

    /*
    //$mail->Host = 'smtp.hostinger.com'; smtp.gmail.com
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; 
                $mail-> SMTPAuth = true;
	            $mail->Username = 'marvinvasquez@itc.edu.gt';
	            $mail->Password ='Tecn@2022';
	            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	            $mail->Port = 587;

                //Configuración del destino
	            $mail->setFrom('marvinvasquez@itc.edu.gt', 'Informe de reportes');
	            $mail->addAddress('marvin23.vasquez@gmail.com','Informe de reportes');

	            $mail->addAttachment($archivo,'Informe');
	            $mail->isHTML(true);
	            $mail->Subject = 'Estimados padres de familia y estudiante, reciban un cordial saludo del colegio ITC, a continuación se detalla el reporte de rendimiento académico y de disciplina:';
	            $mail->Body = 'Esta es una prueba de envio de <b>correo</b>';

	            $mail->send();
    
    */
     
?>