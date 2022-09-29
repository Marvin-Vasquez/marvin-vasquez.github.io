var idGrado;
var idSeccion;
let listaEstudiantes = new Array();
//document.addEventListener('DOMContentLoaded',function(){
if(document.querySelector('#formReporte')){
    let formReporte = document.querySelector('#formReporte');
    formReporte.onsubmit = function(e){
        e.preventDefault();
       fntGuardar();
    }

    async function fntGuardar(){
        let resultado;        
        let intIdGrado = parseInt(document.querySelector('#txtGrado').value);
        $('#txtSección').change(function(){
            if($('#txtSección').val() != "0"){
                intIdSeccion = parseInt(document.querySelector('#txtSección').value);
                document.querySelector('#seccion').value =intIdSeccion;
            }else{
                idSeccion=1;
                document.querySelector('#seccion').value = idSeccion;
                
            }
        });
        let intIdSeccion = document.querySelector('#seccion').value;
        let intIdCurso = document.querySelector('#txtCurso').value;
        let strMotivo = document.querySelector('#txtMotivo').value;
        let strPlan = document.querySelector("#txtPlan").value;
        //alert("Curso: "+intIdCurso);
        if(intIdGrado == 0 ||  intIdCurso == "" || strMotivo == "")
        { 
            Swal.fire('Atención','Todos los datos son obligatorios a excepción del plan de mejora', 'error');
            return;
        }
        $("#listEstudiantesReportados option").each(function(){
            var carnet= $(this).attr('value');
            listaEstudiantes.push(parseInt(carnet));
        });
        //EVALUAR LONGITUD DEL VECTOR PARA SABER SI HAY MAS DE UN ESTUDIANTE
        if(listaEstudiantes.length < 1){
            Swal.fire('Atención','Debe elegir al menos un estudiante para reportar', 'error');
            return;
        }else{
            listaEstudiantes.forEach(function(elemento, indice,array){
                document.querySelector('#carnet').value = elemento;
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxurl = base_url+'Reportes/setReporte';
                var formData = new FormData(formReporte);
                request.open("POST",ajaxurl,true);
                request.send(formData);
                request.onreadystatechange = function(){
                    if(request.readyState != 4) return;
                    if(request.status == 200){
                        var ObjData = JSON.parse(request.responseText);
                        resultado =ObjData.status;
                    }
                } 
            });
        if(resultado == false){
            Swal.fire('Roles de usuario','!Atención¡ No es posible generar el reporte.','error');
        }else{    
            Swal.fire('Reporte Académico','Reporte generado exitosamente.','success');
        }
            formReporte.reset();
            $('#listEstudiantes').empty();
            $('#listEstudiantesReportados').empty();
            $('#txtMotivo').val('');
            $('#txtPlan').val('');
            document.querySelector('#txtSección').value = 0;
            document.querySelector('#txtGrado').value = 0;
            document.querySelector('#txtCurso').value = 0;
        }


        //limpiar array para siguiente reporte
        for (let i = listaEstudiantes.length; i > 0; i--) {
            listaEstudiantes.pop();
          }
    }
}

//},false);

$(function(){
    $('#txtGrado').change(function(){
        if($('#txtGrado').val() == "1"){
            //alert("1ro basico elegido");
            $('#txtSección').prop('disabled',false);
            document.querySelector('#txtSección').value = 0;
        }else{
            $('#txtSección').prop('disabled','disabled');
            idSeccion=1;
            document.querySelector('#txtSección').value =idSeccion;
            fntMostrarEstudiantes();
        }
    });
    $('#txtSección').change(function(){
        if($('#txtSección').val() == "1"){
            document.querySelector('#seccion').value = 1;
        }else if($('#txtSección').val() == "2"){
            document.querySelector('#seccion').value = 2;
        }
    });
    $('#agregar').click(function(){
        $('#listEstudiantes option:selected').each(function(){
            $(this).clone().appendTo('#listEstudiantesReportados');
        });
    });
    $('#quitar').click(function(){
        $('#listEstudiantesReportados option:selected').each(function(){
            $(this).remove();
        });
    });
   
});


function fntNivel(){
    var ajaxUrl  = base_url+'Niveles/getSelectNiveles';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200)
        {
            document.querySelector('#txtGrado').innerHTML=request.responseText;
            document.querySelector('#txtGrado').value="0";
            $('txtGrado').selectpicker('render');
        }
    }
}
//Obtener seccion para form estudiantes
function fntCurso(){
    var ajaxUrl  = base_url+'Cursos/getSelectCursos';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200)
        {
            document.querySelector('#txtCurso').innerHTML=request.responseText;
            document.querySelector('#txtCurso').value="0";
            $('txtCurso').selectpicker('render');
        }
    }
}

function fntListadoEstudiantes(){
    var ajaxUrl  = base_url+'Estudiantes/getSelectEstudiantes/'+idGrado+'/'+idSeccion;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200)
        {
            document.querySelector('#listEstudiantes').innerHTML=request.responseText;
            document.querySelector('#listEstudiantes').value="1";
            $('listEstudiantes').selectpicker('render');
        }
    }
}
function grado(valor){
    idGrado = valor.value;
}

function seccionElegida(valor){
    idSeccion = valor.value;
    fntMostrarEstudiantes();
   //alert(idSeccion);
}
function fntMostrarEstudiantes(){
    fntListadoEstudiantes();
}


window.addEventListener('load',function(){
    idGrado=0;
    idSeccion=1;
    document.querySelector('#seccion').value =idSeccion;
    fntNivel();
    fntCurso();
    fntListadoEstudiantes();
    $('#txtSección').prop('disabled','disabled');
    document.querySelector('#txtGrado').value="0";
    document.querySelector('#txtSección').value="0";
    document.querySelector('#formReporte').reset(); 
},false);