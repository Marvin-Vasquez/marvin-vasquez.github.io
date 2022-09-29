var tableReportes;
document.addEventListener('DOMContentLoaded',function(){
    
    tableReportes = $('#tableReportes').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language":{
            "url":"//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        },
        "ajax":{
            "url": " "+base_url+"Record/getReportes",
            
            "dataSrc":""
        },
        "columns":[
            {"data":"carnet"},
            {"data":"apellido"},
            {"data":"nombre"},
            {"data":"correoEncargado"},
            {"data":"nombreNivel"},
            {"data":"fechaReporte"},
            {"data":"options"},

        ],
        'dom': 'lBfrtip',
        'buttons': [
            
            {
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
        "iDisplayLength":25,
        "order":[[0,"desc"]]

    });
   
});

function openModal()
{
    $('#modalviewReporte').modal('show');
}


//tableEstudiantes.api().ajax.reload();
tableReportes.clear().draw();
window.addEventListener('load',function(){
    //fntViewEstudiante();
    $('#tableReportes').dataTable();
    tableReportes.api().ajax.reload();
    tableReportes.clear().draw();
},false);

function fntViewReportes(carnet){
    $("#lista").find("tr:gt(0)").remove();
    // 
    var idEstudiante = carnet;
    const tabla = document.querySelector('#lista');

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'Record/getDatosReportes/'+idEstudiante;
    
    const opciones = {
        method :'GET'
      }
      
      fetch(ajaxUrl,opciones)
        .then(respuesta => respuesta.json())
        .then(resultado =>{
      
            resultado.forEach(elemento => {
              
              tabla.innerHTML +=  `
                        <tr>
                          <td>${elemento.nombreCurso}</td>
                          <td>${elemento.motivoReporte}</td>
                          <td>${elemento.planMejora}</td>
                        </tr>
              `
            });
        });
    $('#modalviewReporte').modal('show');
    
   
}
function fntNotificarReportes(carnet){
   console.log(carnet);
    var idEstudiante = carnet;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'Record/enviarCorreo/'+idEstudiante;
    request.open("POST",ajaxUrl,true);
    request.send(idEstudiante);
    request.onreadystatechange = function(){
        if(request.readyState == 4  && request.status == 200){
            window.location = base_url+'Views/Template/Email/enviar_reporte.php';
            var ObjData = JSON.parse(request.responseText);
             /*       
            if(ObjData.status){
               
            }else{
                Swal.fire('Lista de reportes', ObjData.msg,'error');
            }*/
        }
    }
    
}

function fntSaludar(valor){
    alert(valor);
}



  /**
   
   */