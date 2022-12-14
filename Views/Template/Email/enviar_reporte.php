
<?php
    //$data =$arrDatosEstudiante;
    dep($data);
    //$nombreEstudiante = $data['estudiante'][$pos]['nombre']." ".$data['estudiante'][$pos]['apellido'];
    //$carnet = $data['estudiante'][$pos]['carnet'];
    //$grado = $data['estudiante'][$pos]['nombreNivel'];
    //$fecha = getdate();
    //$dia =$fecha["mday"];
    //$mes = $fecha["mon"];
    //$anio = $fecha["year"];
    //$fechaReporte =$dia."/".$mes."/".$anio;
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
    <style>
        table{
            width: 100%;
        }
        table td, table th{
            font-size:14px;
        }
        h4{
            margin-bottom: 0px;

        }
        .text-center{
            text-align: center;
        }
        .text-right{
            text-align: right;
        }
        .text-left{
            text-align: left;
        }
        .text-justificado{
            text-align: justify;
        }
        .wd33{
            width: 33.33%;
        }
        img{
            width:110px; 
            height:110px;
        }
        .tbl-estudiante{
            border: 1px solid #CCC;
            border-radius: 10px;
            padding: 5px;
        }
        .wd40{
            width: 40%;
        }
        .wd50{
            width: 50%;
        }
        .wd55{
            width: 55%;
        }
        .wd20{
            width: 20%;
        }
        .tbl-reportes{
            border-collapse: separate;
        }
        .tbl-reportes td{
            border:1px solid #a3914e;
        }
        .tbl-reportes thead th{
            padding: 6px;
            font-size: 18px;
            background-color: #1D6F05;
            color: #FFF;
        }
        .tbl-reportes tbody td{
            border-bottom: 1px solid #a3914e;
            padding: 5px;
        }
        @media screen and (max-widht:470px) {
            .logo{width: 90px;}
            p,table tr td, table tr th{font-size: 9px;}
        }
    </style>

</head>
<body>
    <table class="tbl-header">
        <tr>
            <td>
                <img class="logo" src="<?= media()?>/img/logo_itc.jpg" alt="">
            </td>
            <td class="text-right">
                <h4><strong><?= NOMBRE_EMPRESA?></strong></h4>
                <p><?= DIRECCION_EMPRESA ?> <br>
                   Tel??fono: <?= TELEFONO_EMPRESA?><br>
                   Correo electr??nico: <?= EMAIL_EMPRESA?><br> 
                </p>
            </td>
        </tr>
    </table>
    <br>
    <table class="tbl-estudiante">
        <tbody>
            <tr>
                <td class="wd40"><strong>Nombre del estudiante: </strong></td>
                <td class="wd55 text-left"><?= $nombreEstudiante;?></td>
            </tr>
            <tr>
                <td class="wd40"><strong>Carnet: </strong></td>
                <td class="wd55 text-left"><?= $carnet?></td>
            </tr>
            <tr>
                <td class="wd40"><strong>Grado: </strong></td>
                <td class="wd55 text-left"><?= $grado?></td>
            </tr>
            <tr>
                <td class="wd40"><strong>Fecha de reportes:  </strong></td>
                <td class="wd55 text-left"><?= $fechaReporte?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table class="tbl-reportes">
        <thead>
            <th class="wd20 text-center">Curso</th>
            <th class="wd40 text-center">Motivo del reporte</th>
            <th class="wd40 text-center">Plan de mejoramiento</th>
        </thead>
        <tbody>
            <?php   
                foreach($data['estudiante'][$pos]['reportes'] as $reporte){
            ?>
            <tr>
                <td class="text-left"><?= $reporte['nombreCurso']?></td>
                <td class="text-justificado"><?= $reporte['motivoReporte']?></td>
                <td class="text-justificado"><?= $reporte['planMejora']?></td>
            </tr>  
            <?php   
                }
            ?> 
        </tbody>
    </table>
    <br><br>
    <div class="text-center">
        <p><strong>Ciclo escolar 2,022.</strong></p>
        <p><strong>Atentamente, direcci??n ITC.</strong></p>
    </div>
</body>
</html>