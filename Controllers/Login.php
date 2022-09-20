<?php
    class Login extends Controllers{
        public function __construct()
        {
            //sessionStart();
            session_start();
            if(isset($_SESSION['login']))
			{
				header('Location: '.base_url().'dashboard');
			}
            parent::__construct();
        }
        public function login()
        {
            /* all here*/
           
            $data['page_tag']="Login -Sistema de reportes Itc-";
            $data['page_title']="Login";
            $data['page_name']="login";
            $data['page_functions_js']="functions_login.js";
            $this->views->getView($this,"login",$data);
        }

        public function loginUser()
        {
            //dep($_POST);
            if($_POST){
                if(empty($_POST['txtUsuario']) || empty($_POST['txtPassword'])){
                    $arrResponse = array ('status' => false, 'msg' => 'Datos incorrectos.');
                }else{
                    $strUsuario = strtolower(strClean($_POST['txtUsuario']));
                    $strPassword = hash("SHA256",$_POST['txtPassword']);
                    $requestUser = $this->model->login($strUsuario, $strPassword);
                    //dep($requestUser);
                    //exit;
                    if(empty($requestUser)){
                        $arrResponse = array ('status' => false, 'msg' => '¡Datos de acceso invalidos!');
                    }else{
                        $arrData = $requestUser;
                        $_SESSION['idUsuario'] = $arrData['id'];
                        $_SESSION['Username'] = $arrData['username'];
                        $_SESSION['login']=true;
                        $_SESSION['timeout']=true;
                        $_SESSION['inicio']=time();
                        
                        $arrData = $this->model->sessionLogin($_SESSION['idUsuario']);
                        sessionUser($_SESSION['idUsuario']);
                        //$_SESSION['userData'] = $arrData;
                        $arrResponse = array ('status' => true, 'msg' => '¡Bienvenido!');
                    }
                    
                }
                
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }

            die();
        }
        public function resetPass(){
            //dep($_POST);
            if($_POST){
                error_reporting(0);
                if(empty($_POST['txtCorreo'])){
                    $arrResponse = array('status'=>false,'msg'=>'Error de datos');
                }else{
                    $token = token();
                    $strCorreo = strtolower(strClean($_POST['txtCorreo']));
                    $arrData = $this->model->getUserEmail($strCorreo);
                    if(empty($arrData)){
                        $arrResponse = array('status'=>false,'msg'=>'¡Correo no registrado en el sistema!');
                    }else{
                        $id = $arrData['id'];
                        $nombreUsuario = $arrData['nombre']." ".$arrData['apellido'];
                        
                        $url = base_url().'login/confirmUser/'.$strCorreo.'/'.$token;
                        $requestUpdate = $this->model->setTokenUser($id,$token);
                        
                        $dataUsuario = array('nombreUsuario' => $nombreUsuario,
                                             'correo'=> $strCorreo,
                                            'asunto'=>'Recuperar contraseña '.NOMBRE_REMITENTE,
                                            'url_recovery'=>$url);
                        
                        if($requestUpdate){
                            $sendEmail = sendEmail($dataUsuario,'msj_cambiarPass');
                            if($sendEmail){
                                $arrResponse = array('status'=>true,'msg'=>'¡Correo enviado para restaurar contraseña, revise su bandeja de entrada o spam!');
                            }else{
                                $arrResponse = array('status'=>false,'msg'=>'¡No es posible enviar el correo de restauranción, intente luego!');
                            }
                        }else{
                            $arrResponse = array('status'=>false,'msg'=>'¡No es posible enviar el correo de restauranción, intente luego!');
                        } 
                    }

                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }

            die();
        }

        public function confirmUser(string $params){
           if(empty($params)){
                header('Location: '.base_url());
           }else{
                $arrParams = explode(',',$params);
                //dep($arrParams);
                $strCorreo = strClean($arrParams[0]);
                $strToken = strClean($arrParams[1]);

                $arrResponse = $this->model->getUsuario($strCorreo,$strToken);
                //dep($arrResponse);
                
                if(empty($arrResponse)){
                    header('Location: '.base_url());
                }else{
                    $data['id'] = $arrResponse['id'];
                    $data['correo'] = $strCorreo;
                    $data['token'] = $strToken;
                    $data['page_functions_js']="functions_pass.js";
                    $this->views->getView($this,"cambiarPassword",$data);
                }
            }
        }

        public function setPassword(){

			if(empty($_POST['idUsuario']) || empty($_POST['txtCorreo']) || empty($_POST['txtToken']) || empty($_POST['txtPassword']) || empty($_POST['txtConfirmPassword'])){

					$arrResponse = array('status' => false, 'msg' => 'Error de datos' );
				}else{
					$intId = intval($_POST['idUsuario']);
					$strPassword = $_POST['txtPassword'];
					$strPasswordConfirm = $_POST['txtConfirmPassword'];
					$strEmail = strClean($_POST['txtCorreo']);
					$strToken = strClean($_POST['txtToken']);

					if($strPassword != $strPasswordConfirm){
						$arrResponse = array('status' => false, 'msg' => 'Las contraseñas no son iguales.' );
					}else{
						$arrResponseUser = $this->model->getUsuario($strEmail,$strToken);
						if(empty($arrResponseUser)){
							$arrResponse = array('status' => false, 'msg' => 'Error de datos.' );
						}else{
							$strPassword = hash("SHA256",$strPassword);
							$requestPass = $this->model->insertPassword($intId,$strPassword);
							if($requestPass){
								$arrResponse = array('status' => true, 'msg' => 'Contraseña actualizada con éxito.');
							}else{
								$arrResponse = array('status' => false, 'msg' => 'No es posible realizar el proceso, intente más tarde.');
							}
						}
					}
				}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}
   
    }

?>