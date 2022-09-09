var tableUsuarios;
document.addEventListener('DOMContentLoaded',function(){
    tableUsuarios = $('#tableUsuarios').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language":{
            "url":"//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        },
        "ajax":{
            "url": " "+base_url+"/Usuarios/getUsuarios",
            
            "dataSrc":""
        },
        "columns":[
            {"data":"id"},
            {"data":"nombre"},
            {"data":"apellido"},
            {"data":"username"},
            {"data":"correo"},
            {"data":"tipo"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy":true,
        "iDisplayLength":10,
        "order":[[0,"asc"]]

    });
    //AGREGAR_ROL
    var formUsuario = document.querySelector("#formUsuario");
    formUsuario.onsubmit = function(e){
        e.preventDefault();
        
        var strNombre = document.querySelector('#txtNombre').value;
        var strApellido = document.querySelector('#txtApellido').value;
        var strNombreUsuario = document.querySelector('#txtNombreUsuario').value;
        var strCorreo = document.querySelector('#txtCorreo').value;
        var intTipoUsuario = document.querySelector('#listTipo').value;
        var strPassword = document.querySelector('#txtPass').value;
        var strConfirmPassword = document.querySelector('#txtConfirmPass').value;
        
        
        if(strNombre =='' || strApellido ==''|| strNombreUsuario == ''|| strCorreo =='' || intTipoUsuario==''|| 
        strPassword=='' || strConfirmPassword ==''){
            Swal.fire('Atención','Todos los campos son obligatorios', 'error');
            return false;
        }
        if(strPassword != strConfirmPassword){
            Swal.fire('Atención','Las contraseñas no coinciden', 'error');
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxurl = base_url+'Usuarios/setUsuario';
        var formData = new FormData(formUsuario);
        request.open("POST",ajaxurl,true);
        request.send(formData);
        request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status == 200)
           {
                //console.log(request.responseText);
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                    $('#modalformUsuario').modal('hide');
                    formUsuario.reset();
                    Swal.fire('Usuarios',objData.msg,'success');
                    tableUsuarios.api().ajax.reload();
                       // fntEditUsuario();
                        //fntDelUsuario();
                        //fntViewUsuario();
                    
                }else{
                    Swal.fire('Usuarios', objData.msg,'error');
                }
           }
        } 
    }
});

$('#tableUsuarios').dataTable();

function openModal()
{
    document.querySelector('#idUsuario').value = " "; 
    document.querySelector('#titleModal').innerHTML = "Nuevo Usuario";   
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#formUsuario').reset(); 
    $('#modalFormUsuario').modal('show');
}
window.addEventListener('load',function(){
    fntRolesUsuario();
    /*fntEditUsuario();
    fntDelUsuario();
    fntViewUsuario();*/
},false);
//Mostrar usuarios en la tabla
function fntViewUsuario(id){
 
    var idUsuario =parseInt(id);
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'Usuarios/getUsuario/'+idUsuario;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
     if(request.readyState == 4  && request.status == 200){
        var ObjData = JSON.parse(request.responseText);
                    
         if(ObjData.status){
            document.querySelector('#id').innerHTML = ObjData.data.id;
            document.querySelector('#Nombre').innerHTML = ObjData.data.nombre;
            document.querySelector('#Apellido').innerHTML = ObjData.data.apellido;
            document.querySelector('#UserName').innerHTML = ObjData.data.username;
            document.querySelector('#mail').innerHTML = ObjData.data.correo;
            document.querySelector('#tipo').innerHTML = ObjData.data.tipo;
            $('#modalviewUsuario').modal('show');
            }else{
                Swal.fire('Usuarios', ObjData.msg,'error');
            }
     }
    }
    
}
//Obtener roles para form usuario
function fntRolesUsuario(){
    var ajaxUrl  = base_url+'Roles/getSelectRoles';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200)
        {
            document.querySelector('#listTipo').innerHTML=request.responseText;
            document.querySelector('#listTipo').value="1";
            $('listTipo').selectpicker('render');
        }
    }
}
// Editar usuario
function fntEditUsuario(id){

    document.querySelector('#titleModal').innerHTML ="Actualizar Usuario";
    document.querySelector('#btnText').innerHTML ="Actualizar";

    var idUsuario = id;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'Usuarios/getUsuario/'+idUsuario;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200){
            var objData = JSON.parse(request.responseText);

            if(objData.status)
            {
                document.querySelector("#idUsuario").value = objData.data.id;
                document.querySelector("#txtNombre").value = objData.data.nombre;
                document.querySelector("#txtApellido").value = objData.data.apellido;
                document.querySelector("#txtNombreUsuario").value = objData.data.username;
                document.querySelector("#txtCorreo").value = objData.data.correo;
                document.querySelector("#listTipo").value =objData.data.tipo;
                
                if(objData.data.tipo == "Administrador"){
                    var optionSelect ='<option value="1" selected style="display:none;">Administrador</option>';
                }else if(objData.data.tipo == "Docente"){
                    var optionSelect ='<option value="2" selected style="display:none;">Docente</option>';
                }else if(objData.data.tipo == "Auxiliar"){
                    var optionSelect ='<option value="3" selected style="display:none;">Auxiliar</option>';
                }
                var htmlSelect = `${optionSelect}
                                            <option value="1">Administrador</option>
                                            <option value="2">Docente</option>
                                            <option value="3">Auxiliar</option>
                                          `;
                document.querySelector("#listTipo").innerHTML=htmlSelect;
                $('#modalFormUsuario').modal('show');
            }
        }
    
        
    }

}
//eliminar Usuario
function fntDelUsuario(id){
    var idUsuario = id; 
    //alert(idUsuario);
    Swal.fire({
    title:"Eliminar Usuario",
    text: "¿Está seguro de eliminar el Usuario?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Sí, eliminar!",
    cancelButtonText: "No, cancelar!",
    closeOnConfirm: false,
    closeOnCancel:true
    }).then((result) => {
    if(result.isConfirmed){
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'Usuarios/delUsuario/';
        var strData = "idUsuario="+idUsuario;
        request.open("POST",ajaxUrl,true);
        request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        request.send(strData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                
                if(objData.status){
                    Swal.fire('Eliminar Usuario',objData.msg,'success');
                    tableUsuarios.api().ajax.reload(function(){
                        fntRolesUsuario();
                        //fntEditUsuario();
                        //fntDelUsuario();
                        //fntViewUsuario();
                    });
                }else{
                Swal.fire('Atención!',objData.msg,'error');
                }
            }
        } 
    }
    });
}