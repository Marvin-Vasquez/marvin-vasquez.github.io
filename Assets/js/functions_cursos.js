var tableCursos;
document.addEventListener('DOMContentLoaded',function(){
    tableCursos = $('#tableCursos').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language":{
            "url":"//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        },
        "ajax":{
            "url": " "+base_url+"Cursos/getCursos",
        
            "dataSrc":""
        },
        "columns":[
            {"data":"id"},
            {"data":"nombreCurso"},
            {"data":"options"}

        ],
        "resonsieve":"true",
        "bDestroy":true,
        "iDisplayLength":10,
        "order":[[0,"asc"]]

    });
    //AGREGAR_CURSO
    var formCurso = document.querySelector("#formCurso");
    formCurso.onsubmit = function(e){
        e.preventDefault();
        
        var intCodigo = parseInt(document.querySelector('#txtCodigo').value); 
        var strNombre = document.querySelector('#txtNombre').value;
        
        //console.log("Id: "+intIdRol+"tipo: "+strTipo+ " Descripción: "+strDescripcion);
        if(intCodigo == "" || strNombre == "")
        { 
            //alert("campos vacios");
            Swal.fire('Atención','Todos los campos son obligatorios', 'error');
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxurl = base_url+'Cursos/setCurso';
        var formData = new FormData(formCurso);
        request.open("POST",ajaxurl,true);
        request.send(formData);
        request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status == 200)
           {
                //console.log(request.responseText);
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                    $('#modalformCursos').modal('hide');
                    formCurso.reset();
                    
                    Swal.fire('Cursos',objData.msg,'success');
                    tableCursos.api().ajax.reload(function(){
                        //fntEditCurso();
                        //fntDelCurso();
                    });
                }else{
                    Swal.fire('Cursos', objData.msg,'error');
                }
           }
        } 
    }
});

$('#tableCursos').dataTable();

function openModal()
{
    document.querySelector("#TipoOperacion").value = 1;
    document.querySelector('#txtCodigo').value = ""; 
    document.querySelector('#titleModal').innerHTML = "Nuevo curso";   
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#formCurso').reset(); 
    $('#modalFormCursos').modal('show');
}
window.addEventListener('load',function(){
    //fntViewCurso();
    /*fntEditRol();
    fntDelRol();*/
    
},false);
//mostrar datos de cursos
function fntViewCurso(id){
 
    var idCurso =parseInt(id);
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'Cursos/getCurso/'+idCurso;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4  && request.status == 200){
            var ObjData = JSON.parse(request.responseText);
                    
            if(ObjData.status){
                document.querySelector('#id').innerHTML = ObjData.data.id;
                document.querySelector('#nombre').innerHTML = ObjData.data.nombreCurso;
            
                $('#modalviewCurso').modal('show');
            }else{
                Swal.fire('Usuarios', ObjData.msg,'error');
            }
        }
    }
}

//Editar curso
function fntEditCurso(id){
    document.querySelector('#titleModal').innerHTML ="Actualizar Curso";
    document.querySelector('#btnText').innerHTML ="Actualizar";
    document.querySelector("#TipoOperacion").value = 2;
    var idCurso = id;    
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'Cursos/getCurso/'+idCurso;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
    if(request.readyState == 4 && request.status == 200){
        var ObjData = JSON.parse(request.responseText);
        if(ObjData.status){
            document.querySelector('#txtCodigo').value=ObjData.data.id;
            document.querySelector('#txtNombre').value=ObjData.data.nombreCurso; 

            $('#modalFormCursos').modal('show');
        }else{
            Swal.fire('Actualizar', ObjData.msg,'error');
        }
    }
    }

}
//Eliminar curso
function fntDelCurso(id){
    var idCurso = id;
    Swal.fire({
        title:"Eliminar curso",
        text: "¿Está seguro de eliminar el curso?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel:true
    }).then((result) => {
        if(result.isConfirmed){
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'Cursos/delCurso/';
            var strData = "idCurso="+idCurso;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                if(objData.status){
                    Swal.fire('Eliminar Curso',objData.msg,'success');
                        tableCursos.api().ajax.reload(function(){
                            //fntEditRol();
                            //fntDelRol();
                        });
                    }else{
                        Swal.fire('Atención!',objData.msg,'error');
                    }
                }
            } 
        }
    });
            
        
}