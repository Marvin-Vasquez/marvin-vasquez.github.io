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
        //alert("hola");
        var strTipo = document.querySelector('#listTipo').value;
        var strDescripcion = document.querySelector("#txtDescripcion").value;
        //alert("tipo: "+strTipo+ " Descripción: "+strDescripcion);
        if( strTipo === "" || strDescripcion === "")
        { 
            //alert("campos vacios");
            Swal.fire(
                'Atención',
                'Todos los campos son obligatorios',
                'error'
              );
            //swal("Atención","Todos los campos son obligatorios.","Error");
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
                        // fntEditRol();
                        // fntDelRol();
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
function fntEditRol(){
    document.querySelector('#titleModal').innerHTML = "Actualizar rol";   
    document.querySelector('#btnText').innerHTML = "Actualizar";

    //var idRol = this.getAttribute("rl");
    const result = $(".text-center").attr("rl");
    var idRol=parseInt(result);
    console.log(result);
/*
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'Roles/getRol/'+idRol;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200)
        {
            console.log(request.responseText);
        }
    }*/

    $('#modalFormRol').modal('show');
}