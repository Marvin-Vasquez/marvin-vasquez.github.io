<?php
    //retorna url del proyecto
    function base_url()
    {
        return BASE_URL;
    
    }
    function media(){
        return BASE_URL."Assets";
    }

    function headerAdmin($data=""){
        $view_header="Views/Template/header_admin.php";
        require_once ($view_header);
    }
    
    function footerAdmin($data=""){
        $view_footer="Views/Template/footer_admin.php";
        require_once ($view_footer);
    }
 
    function getFileReporte(string $url, $data){
        ob_start();
        require_once("Views/{$url}.php");
        $file = ob_get_clean();

        return $file;
    }

    //Muestra informacion formateada
    function dep($data){
        $format  = print_r('<pre>');
        $format .= print_r($data);
        $format .= print_r('</pre>');
        return $format;
    }
    // mostrar modal
    function getModal(string $nameModal,$data)
    {
        $view_modal= "Views/Template/Modals/{$nameModal}.php";
        require_once $view_modal;
    }
    function sessionUser(int $idUsuario){
        require_once ("Models/LoginModel.php");
        $objLogin = new LoginModel();
        $request = $objLogin->sessionLogin($idUsuario);
        return $request;
    }
    function sessionStart(){
        session_start();
        $inactive = 1800; //tiempo en segundos
        if(isset($_SESSION['timeout'])){
            $session_in =time() - $_SESSION['inicio'];
            if($session_in > $inactive){
                header("Location: ".BASE_URL."Logout");
            }
        }else{
            header("Location: ".BASE_URL."Logout");
        }

    }

    //Elimina excesos de espacios entre palabras
    function strClean($strCadena){
        $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena);
        $string = trim($string); //Elimina espacios en blanco al inicio y al final
        $string = stripslashes($string); // Elimina las \ invertidas
        $string = str_ireplace("<script>","",$string);
        $string = str_ireplace("</script>","",$string);
        $string = str_ireplace("<script src>","",$string);
        $string = str_ireplace("<script type=>","",$string);
        $string = str_ireplace("SELECT * FROM","",$string);
        $string = str_ireplace("DELETE FROM","",$string);
        $string = str_ireplace("INSERT INTO","",$string);
        $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
        $string = str_ireplace("DROP TABLE","",$string);
        $string = str_ireplace("OR '1'='1","",$string);
        $string = str_ireplace('OR "1"="1"',"",$string);
        $string = str_ireplace('OR ´1´=´1´',"",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("in NULL; --","",$string);
        $string = str_ireplace("LIKE '","",$string);
        $string = str_ireplace('LIKE "',"",$string);
        $string = str_ireplace('LIKE ´',"",$string);
        $string = str_ireplace("OR 'a'='a","",$string);
        $string = str_ireplace('OR "a"="a',"",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("--","",$string);
        $string = str_ireplace("^","",$string);
        $string = str_ireplace("[","",$string);
        $string = str_ireplace("]","",$string);
        $string = str_ireplace("==","",$string);
        return $string;
    }
    //Generar un Token
    function token(){
        $r1 = bin2hex(random_bytes(10));
        $r2 = bin2hex(random_bytes(10));
        $r3 = bin2hex(random_bytes(10));
        $r4 = bin2hex(random_bytes(10));
        $token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;
        
        return $token;
    }
    //Envio de correo para recuperación de cuenta
    function sendEmail($data,$template){
        $asunto = $data['asunto'];
        $emailDestino = $data['correo'];
        $empresa = NOMBRE_REMITENTE;
        $remitente = EMAIL_REMITENTE;
        //ENVIO DE CORREO
        $de = "MIME-Version: 1.0\r\n";
        $de .= "Content-type: text/html; charset=UTF-8\r\n";
        $de .= "From: {$empresa} <{$remitente}>\r\n";
        ob_start(); //cargar en memora buffer el siguiente archivo
        require_once("Views/Template/Email/".$template.".php");
        $mensaje = ob_get_clean();
        $send = mail($emailDestino, $asunto, $mensaje, $de);

        return $send;
    }
?>