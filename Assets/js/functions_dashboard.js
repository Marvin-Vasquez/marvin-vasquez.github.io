
function fntTotalEstudiantes(){
    var ajaxUrl  = base_url+'Dashboard/totalEstudiantes';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200)
        {
            //var ObjData = JSON.parse(request.responseText);
            //console.log(ObjData);
            document.querySelector('#totalEstudiantes').innerHTML=request.responseText;
        }
    }
}

function fntTotalCursos(){
    var ajaxUrl  = base_url+'Dashboard/totalCursos';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200)
        {
            //var ObjData = JSON.parse(request.responseText);
            //console.log(ObjData);
            document.querySelector('#totalCursos').innerHTML=request.responseText;
        }
    }
}
function fntTotalDocentes(){
    var ajaxUrl  = base_url+'Dashboard/totalDocentes';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200)
        {
            //var ObjData = JSON.parse(request.responseText);
            //console.log(ObjData);
            document.querySelector('#totalDocentes').innerHTML=request.responseText;
        }
    }
}
function fntReportesDiarios(){
    var ajaxUrl  = base_url+'Dashboard/totalReportes';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200)
        {
            //var ObjData = JSON.parse(request.responseText);
            //console.log(ObjData);
            document.querySelector('#totalReportesDiarios').innerHTML=request.responseText;
        }
    }
}
function fntCursoMas(){
    var ajaxUrl  = base_url+'Dashboard/cursoMas';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200)
        {
            //var ObjData = JSON.parse(request.responseText);
            //console.log(ObjData);
            document.querySelector('#cursoMasReportado').innerHTML=request.responseText;
        }
    }
}
function fntCursoMenos(){
    var ajaxUrl  = base_url+'Dashboard/cursoMenos';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200)
        {
            //var ObjData = JSON.parse(request.responseText);
            //console.log(ObjData);
            document.querySelector('#cursoMenosReportado').innerHTML=request.responseText;
        }
    }
}

window.addEventListener('load',function(){
    fntTotalEstudiantes();
    fntTotalCursos();
    fntTotalDocentes();
    fntReportesDiarios();
    fntCursoMas();
    fntCursoMenos();
    //$('#tableRecord').dataTable();
    //tableRecord.api().ajax.reload();
},false);