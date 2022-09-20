if(document.querySelector('#formUpdateUser')){
    let formUpdateUser = document.querySelector('#formUpdateUser');
    formUpdateUser.onsubmit = function(e){
        e.preventDefault();
       fntUpdate();
    }

    async function fntUpdate(){
        //let idUsuario = parseInt(document.querySelector('#idUsuario').value);      
        let strNombre = document.querySelector('#txtNombre').value;
        let strApellido = document.querySelector('#txtApellido').value;
        let strNombreUsuario = document.querySelector('#txtNombreUsuario').value;
        let strCorreo = parseInt(document.querySelector('#txtCorreo').value);
        let strPass = document.querySelector('#txtPass').value;
        let strConfirmPass = document.querySelector("#txtConfirmPass").value;
        
        if(strNombre == "" ||  strApellido == "" || strNombreUsuario == "" || strCorreo == "" || strPass == "" || strConfirmPass == "")
        { 
            Swal.fire('Atención','Todos los datos son obligatorios', 'error');
            return false;
        }else if(strPass.length < 8){
            Swal.fire('Atención','La contraseña debe contener al menos 8 caracteres', 'warning');
            return false;
        }else if(strPass !=strConfirmPass ){
            Swal.fire('Atención','Las contraseñas no coinciden', 'warning');
            return false;
        }else{

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxurl = base_url+'Usuarios/actualizarUsuario';
            var formData = new FormData(formUpdateUser);
            request.open("POST",ajaxurl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState != 4) return;
                if(request.status == 200){
                    var ObjData = JSON.parse(request.responseText);
                    if(ObjData.status){
                        Swal.fire('Perfil de usuario',ObjData.msg,'success');
                        //location.reload();
                    }else{
                        Swal.fire('Perfil de usuario','!Atención¡ No es posible actualizar el perfil en este momento.','error');
                    }
                }
                
            }  
        }
        /* 
        if(resultado == false){
            
        }else{    
            
        }*/
        
    }
}