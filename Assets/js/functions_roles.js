var tableRoles;
document.addEventListener('DOMContentLoaded',function(){
    tableRoles = $('#tableRoles').dataTable( {
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
            {"data":"descripcion"}
        ],
        "resonsieve":"true",
        "bDestroy":true,
        "iDisplayLength":10,
        "order":[[0,"desc"]]

    });
});


function openModal()
{
    $('#modalFormRol').modal('show');
}