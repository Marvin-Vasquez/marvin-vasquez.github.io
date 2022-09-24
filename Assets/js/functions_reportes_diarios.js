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
            {"data":"correlativo"},
            {"data":"carnet"},
            {"data":"apellido"},
            {"data":"nombre"},
            {"data":"nombreNivel"},
            {"data":"nombreCurso"},
            {"data":"motivoReporte"},
            {"data":"planMejora"},
            {"data":"fechaReporte"},
            //{"data":"options"}

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
        "iDisplayLength":20,
        "order":[[0,"desc"]]

    });
});


//tableEstudiantes.api().ajax.reload();

window.addEventListener('load',function(){
    //fntViewEstudiante();
    $('#tableReportes').dataTable();
    tableReportes.api().ajax.reload();
},false);