
document.addEventListener('DOMContentLoaded',function(){
    if(document.querySelector('#formChangePass')){
        let formChangePass = document.querySelector('#formChangePass');
        formChangePass.onsubmit = function(e){
            e.preventDefault();
            //alert("hola");
            let strPass = document.querySelector('#txtPassword').value;
            let strConfirmPass = document.querySelector('#txtConfirmPassword').value;
            let id = document.querySelector('#idUsuario').value;
            //console.log(strPass);
            //console.log(strConfirmPass);
            
            if(strPass =="" || strConfirmPass ==""){
                Swal.fire('¡Atención!','Ingrese su contreseña y confirmela','error');
                return false;
            }else{
                if(strPass.length < 8){
                    Swal.fire('¡Atención!','Su contraseña debe tener al menos 8 caracteres','warning');
                    return false;
                }else if(strPass != strConfirmPass){
                    Swal.fire('¡Atención!','Las contraseñas no coinciden','warning');
                    return false;
                }
            
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url+'Login/setPassword';
                var formData = new FormData(formChangePass);
                request.open("POST",ajaxUrl,true);
                request.send(formData);

                request.onreadystatechange = function(){
                    if(request.readyState != 4) return;
                    if(request.status == 200){
                        var objData = JSON.parse(request.responseText);
                        if(objData.status)
						{
                            Swal.fire({
                                title:"",
                                text: objData.msg,
                                icon: "success",
                                //showCancelButton: true,
                                confirmButtonText: "Iniciar sesión",
                                //cancelButtonText: "No, cancelar!",
                                closeOnConfirm: false,
                                //closeOnCancel:true
                            }).then((result) => {
                                if(result.isConfirmed){
                                    window.location = base_url+'login';
                                }
                            });
                        }else{
                            Swal.fire('¡Atención!',objData.msg,'error');
                        }
                    }else{
                        Swal.fire('¡Atención!','Error en el proceso','error');
                    }

                }
            }   

        }
    }

},false);