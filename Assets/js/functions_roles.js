var tableRoles;
document.addEventListener('DOMContentLoaded',function(){
    tableRoles = $('#tableRoles').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language":{
            "url":"//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        },
        "ajax":{
            "url": " "+base_url+"/Roles/getRoles",
            
            "dataSrc":""
        },
        "columns":[
            {"data":"id"},
            {"data":"tipo"},
            {"data":"descripcion"},
            {"data":"options"}

        ],
        "resonsieve":"true",
        "bDestroy":true,
        "iDisplayLength":10,
        "order":[[0,"desc"]]

    });
    //AGREGAR_ROL
    var formRol = document.querySelector("#formRol");
    formRol.onsubmit = function(e){
        e.preventDefault();
        
        var intIdRol = parseInt(document.querySelector('#idRol').value); 
        var strTipo = document.querySelector('#listTipo').value;
        var strDescripcion = document.querySelector("#txtDescripcion").value;
        
        //console.log("Id: "+intIdRol+"tipo: "+strTipo+ " Descripción: "+strDescripcion);
        if( strTipo === "" || strDescripcion === "")
        { 
            //alert("campos vacios");
            Swal.fire('Atención','Todos los campos son obligatorios', 'error');
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxurl = base_url+'Roles/setRol';
        var formData = new FormData(formRol);
        request.open("POST",ajaxurl,true);
        request.send(formData);
        request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status == 200)
           {
                //console.log(request.responseText);
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                    $('#modalFormRol').modal('hide');
                    formRol.reset();
                    Swal.fire('Roles de usuario',objData.msg,'success');
                    tableRoles.api().ajax.reload(function(){
                        fntEditRol();
                        fntDelRol();
                    });
                }else{
                    Swal.fire('Roles de usuario', objData.msg,'error');
                }
           }
        }
        
    }
});

$('#tableRoles').dataTable();

function openModal()
{
    document.querySelector('#idRol').value = ""; 
    document.querySelector('#titleModal').innerHTML = "Nuevo rol";   
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#formRol').reset(); 
    $('#modalFormRol').modal('show');
}
window.addEventListener('load',function(){
    fntEditRol();
    fntDelRol();
},false);


function fntEditRol(){
    var btnEditarRol = document.querySelectorAll(".btnEditarRol");
    btnEditarRol.forEach(function(btnEditarRol){
        btnEditarRol.addEventListener('click',function(){
            document.querySelector('#titleModal').innerHTML = "Actualizar rol";   
            document.querySelector('#btnText').innerHTML = "Actualizar";

            //Extraer atributo rl
           
            var idRol = this.getAttribute("rl");
            //console.log(idRol);

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'Roles/getRol/'+idRol;
            request.open("GET",ajaxUrl,true);
            request.send();
            request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var ObjData = JSON.parse(request.responseText);
                if(ObjData.status){
                    document.querySelector('#idRol').value=ObjData.data.id;
                    document.querySelector('#txtDescripcion').value=ObjData.data.descripcion; 

                    if(ObjData.data.tipo == "Administrador"){
                        var optionSelect ='<option value="1" selected style="display:none;">Administrador</option>';
                    }else if(ObjData.data.tipo=="Docente"){
                        var optionSelect ='<option value="2" selected style="display:none;">Docente</option>';
                    }else if(ObjData.data.tipo=="Auxiliar"){
                        var optionSelect ='<option value="3" selected style="display:none;">Auxiliar</option>';
                    }
                    var htmlSelect = `${optionSelect}
                                        <option value="1">Administrador</option>
                                        <option value="2">Docente</option>
                                        <option value="3">Auxiliar</option>
                                      `;
                    document.querySelector("#listTipo").innerHTML=htmlSelect;
                    $('#modalFormRol').modal('show');
                    }else{
                        Swal.fire('Actualizar', ObjData.msg,'error');
                    }

                }
            }
        });
    });
}

function fntDelRol(){
    var btnDelRol = document.querySelectorAll(".btnDelRol");
    btnDelRol.forEach(function(btnDelRol){
        btnDelRol.addEventListener('click',function(){
            var idRol = this.getAttribute("rl"); 
            //alert(idrol);
            Swal.fire({
                title:"Eliminar Rol",
                text: "¿Está seguro de eliminar el Rol?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, eliminar!",
                cancelButtonText: "No, cancelar!",
                closeOnConfirm: false,
                closeOnCancel:true
            }).then((result) => {
                if(result.isConfirmed){
                    var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
                    var ajaxUrl = base_url+'Roles/delRol/';
                    var strData = "idRol="+idRol;
                    request.open("POST",ajaxUrl,true);
                    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                    request.send(strData);
                    request.onreadystatechange = function(){
                        if(request.readyState == 4 && request.status == 200){
                            var objData = JSON.parse(request.responseText);
                            if(objData.status){
                                Swal.fire('Eliminar Rol',objData.msg,'success');
                                tableRoles.api().ajax.reload(function(){
                                    fntEditRol();
                                    fntDelRol();
                                });
                            }else{
                                Swal.fire('Atención!',objData.msg,'error');
                            }
                        }
                    } 
                }
            });
            
        });
    });
}