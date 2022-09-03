window.addEventListener('load',function(){
    fntRolesUsuario();
});



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

function openModal()
{
    document.querySelector('#idUsuario').value = " "; 
    document.querySelector('#titleModal').innerHTML = "Nuevo Usuario";   
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#formUsuario').reset(); 
    $('#modalFormUsuario').modal('show');
}