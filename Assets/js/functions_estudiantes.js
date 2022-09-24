var tableEstudiantes;
document.addEventListener('DOMContentLoaded',function(){
    tableEstudiantes = $('#tableEstudiantes').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language":{
            "url":"//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        },
        "ajax":{
            "url": " "+base_url+"Estudiantes/getEstudiantes",
            
            "dataSrc":""
        },
        "columns":[
            {"data":"carnet"},
            {"data":"nombre"},
            {"data":"apellido"},
            {"data":"nombreNivel"},
            {"data":"nombreSeccion"},
            {"data":"options"}

        ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn-copy"
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Esportar a Excel",
                "className": "btn-excel"
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Esportar a PDF",
                "className": "btn-pdf"
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Esportar a CSV",
                "className": "btn-csv"
            }
        ],
        "resonsieve":"true",
        "bDestroy":true,
        "iDisplayLength":10,
        "order":[[0,"asc"]]

    });
    //AGREGAR ESTUDIANTE
    var formEstudiante = document.querySelector("#formEstudiante");
    formEstudiante.onsubmit = function(e){
        e.preventDefault();
        
        var intCarnet = document.querySelector('#txtCarnet').value;
        var strNombre = document.querySelector('#txtNombre').value;
        var strApellido = document.querySelector('#txtApellido').value;
        var strNombreEncargado = document.querySelector('#txtNombreEncargado').value;
        var strCorreoEncargado = document.querySelector('#txtCorreoEncargado').value;
        var intIdNivel = document.querySelector('#listNiveles').value;
        var intIdSeccion = document.querySelector('#listSeccion').value;

        if(intCarnet =='' || strNombre =='' || strApellido =='' || strNombreEncargado == '' || strCorreoEncargado =='' || intIdNivel=='' || 
        intIdSeccion ==''){
            Swal.fire('Atención','Todos los campos son obligatorios', 'error');
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxurl = base_url+'Estudiantes/setEstudiante';
        var formData = new FormData(formEstudiante);
        request.open("POST",ajaxurl,true);
        request.send(formData);
        request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status == 200)
           {
                //console.log(request.responseText);
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                    $('#modalformEstudiantes').modal('hide');
                    formEstudiante.reset();
                    Swal.fire('Estudiantes',objData.msg,'success');
                    tableEstudiantes.api().ajax.reload(function(){
                        fntNivel();
                        fntSeccion();
                    });
                }else{
                    Swal.fire('Estudiantes', objData.msg,'error');
                }
           }
        }
        
    }
});

$('#tableEstudiantes').dataTable();

function openModal()
{
    document.querySelector("#TipoOperacion").value = 1;
    document.querySelector('#txtCarnet').value = ""; 
    document.querySelector('#titleModal').innerHTML = "Nuevo Estudiane";   
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#formEstudiante').reset(); 
    $('#modalFormEstudiantes').modal('show');
}
window.addEventListener('load',function(){
    //fntViewEstudiante();
    fntNivel();
    fntSeccion();
    //fntEditEstudiante();
    //fntDelEstudiante();
},false);
//MOSTRAR ESTUDIANTE
function fntViewEstudiante(id){
    var idEstudiante = id;
    //alert(idEstudiante);
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'Estudiantes/getEstudiante/'+idEstudiante;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4  && request.status == 200){
            var ObjData = JSON.parse(request.responseText);
                    
            if(ObjData.status){
                document.querySelector('#carnet').innerHTML = ObjData.data.carnet;
                document.querySelector('#nombre').innerHTML = ObjData.data.nombre;
                document.querySelector('#apellido').innerHTML = ObjData.data.apellido;
                document.querySelector('#nombreEncargado').innerHTML = ObjData.data.nombreEncargado;
                document.querySelector('#correoEncargado').innerHTML = ObjData.data.correoEncargado;
                document.querySelector('#grado').innerHTML = ObjData.data.nombreNivel;
                document.querySelector('#seccion').innerHTML = ObjData.data.nombreSeccion;
                $('#modalviewEstudiante').modal('show');
            }else{
                Swal.fire('Estudiantes', ObjData.msg,'error');
            }
        }
    }
}

//Obtener niveles para form usuario
function fntNivel(){
    var ajaxUrl  = base_url+'Niveles/getSelectNiveles';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200)
        {
            document.querySelector('#listNiveles').innerHTML=request.responseText;
            document.querySelector('#listNiveles').value="1";
            $('listNiveles').selectpicker('render');
        }
    }
}
//Obtener seccion para form estudiantes
function fntSeccion(){
    var ajaxUrl  = base_url+'Secciones/getSelectSecciones';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200)
        {
            document.querySelector('#listSeccion').innerHTML=request.responseText;
            document.querySelector('#listSeccion').value="1";
            $('listSeccion').selectpicker('render');
        }
    }
}

//EDITAR ESTUDIANTE
function fntEditEstudiante(id){
    
    var idEstudiante = id;
    document.querySelector('#titleModal').innerHTML = "Actualizar Estudiante";   
    document.querySelector('#btnText').innerHTML = "Actualizar";
    document.querySelector("#TipoOperacion").value = 2;

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'Estudiantes/getEstudiante/'+idEstudiante;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
    if(request.readyState == 4 && request.status == 200){
        var ObjData = JSON.parse(request.responseText);
        if(ObjData.status){
            document.querySelector('#txtCarnet').value=ObjData.data.carnet;
            document.querySelector('#txtNombre').value=ObjData.data.nombre;
            document.querySelector('#txtApellido').value=ObjData.data.apellido; 
            document.querySelector('#txtNombreEncargado').value=ObjData.data.nombreEncargado; 
            document.querySelector('#txtCorreoEncargado').value=ObjData.data.correoEncargado;  

            if(ObjData.data.nombreNivel == "1ro básico"){
                var optionSelect ='<option value="1" selected style="display:none;">1ro básico</option>';
            }else if(ObjData.data.nombreNivel=="2do básico"){
                var optionSelect ='<option value="2" selected style="display:none;">2do básico</option>';
            }else if(ObjData.data.nombreNivel=="3ro básico"){
                        var optionSelect ='<option value="3" selected style="display:none;">3ro básico</option>';
            }
            var htmlSelect = `${optionSelect}
                                    <option value="1">1ro básico</option>
                                    <option value="2">2do básico</option>
                                    <option value="3">3ro básico</option>
                                      `;
            document.querySelector("#listNiveles").innerHTML=htmlSelect;

            if(ObjData.data.nombreSeccion == "A"){
                var optionSelect ='<option value="1" selected style="display:none;">A</option>';
            }else if(ObjData.data.nombreSeccion=="B"){
                var optionSelect ='<option value="2" selected style="display:none;">B</option>';
            }
            var htmlSelect = `${optionSelect}
                               <option value="1">A</option>
                               <option value="2">B</option>
                            `;
            document.querySelector("#listSeccion").innerHTML=htmlSelect;

            $('#modalFormEstudiantes').modal('show');
            }else{
                Swal.fire('Actualizar', ObjData.msg,'error');
            }
        }
    }
}
//ELIMINAR ESTUDIANTE
function fntDelEstudiante(id){
   
    var idEstudiante = id; 
    Swal.fire({
        title:"Eliminar Estudiante",
        text: "¿Está seguro de eliminar al estudiante?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel:true
    }).then((result) => {
        if(result.isConfirmed){
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'Estudiantes/delEstudiante/';
            var strData = "idEstudiante="+idEstudiante;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status){
                        Swal.fire('Eliminar estudiante',objData.msg,'success');
                        tableEstudiantes.api().ajax.reload(function(){
                            fntNivel();
                            fntSeccion();
                        });
                    }else{
                        Swal.fire('Atención!',objData.msg,'error');
                    }
                }
            } 
        }
    });        
}