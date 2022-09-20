
$(function(){
    $('#formResetPass').hide();
    $('#btnShowFormReset').click(function(){
        $('#formLogin').hide();
        $('#formResetPass').fadeIn();
    });
    $('#btnShowFormLogin').click(function(){
        $('#formResetPass').hide();
        $('#formLogin').fadeIn(); 
    });
});
var divLoading = document.querySelector('#divLoading');
document.addEventListener('DOMContentLoaded',function(){
    if(document.querySelector('#formLogin')){
        let formLogin = document.querySelector('#formLogin');
        formLogin.onsubmit = function(e){
            e.preventDefault();
            let strUsuario = document.querySelector('#txtUsuario').value;
            let strPassword = document.querySelector('#txtPassword').value;

            if(strUsuario =="" || strPassword ==""){
                Swal.fire('Acceso','Ingrese Usuario y contraseña','error');
                return false;
            }else{
                divLoading.style.display ="flex";
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url+'Login/loginUser';
                var formData = new FormData(formLogin);
                request.open("POST",ajaxUrl,true);
                request.send(formData);

                request.onreadystatechange = function(){
                    if(request.readyState != 4) return;
                    if(request.status == 200){
                        var objData = JSON.parse(request.responseText);
                        if(objData.status){
                            window.location = base_url+'dashboard';
                        }else{
                            Swal.fire('Acceso',objData.msg,'error');
                            document.querySelector('#txtPassword').value="";
                            document.querySelector('#txtUsuario').value="";
                        }
                    }else{
                        Swal.fire('Acceso','Error al iniciar sesión','error');
                    }
                    divLoading.style.display ="none";
                    return false;
                }                
            }
        }
    }

    if(document.querySelector('#formResetPass')){
        let formResetPass = document.querySelector('#formResetPass');
        formResetPass.onsubmit = function(e){
            e.preventDefault();
            let correo = document.querySelector('#txtCorreo').value;
            if(correo ==""){
                Swal.fire('Recuperación de contraseña','Ingrese su correo para continuar','error');
                return false;
            }else{
                divLoading.style.display ="flex";
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url+'Login/resetPass';
                var formData = new FormData(formResetPass);
                request.open("POST",ajaxUrl,true);
                request.send(formData);

                request.onreadystatechange = function(){
                    if(request.readyState != 4) return;
                    if(request.status == 200){
                        var objData = JSON.parse(request.responseText);
                        if(objData.status){
                            Swal.fire({
                                title:"",
                                text: objData.msg,
                                icon: "success",
                                //showCancelButton: true,
                                confirmButtonText: "Aceptar",
                                //cancelButtonText: "No, cancelar!",
                                closeOnConfirm: false,
                                //closeOnCancel:true
                            }).then((result) => {
                                if(result.isConfirmed){
                                    window.location = base_url;
                                }
                            });
                        }else{
                            Swal.fire('Recuperación de contraseña',objData.msg,'error');
                        }
                    }else{
                        Swal.fire('¡Atención!','Error al solicitar recuperación de contraseña','error');
                    }
                    divLoading.style.display ="none";
                    return false;
                }
            }
        }
    }

},false);
