<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Lista de Productos </title>
    <style>
        body{
            padding-top: 15px;
            font-family: "Helvetica";
        }
        table{
            width: 100%;
        }
        th, td {
            padding: 5px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #8b8d88;
            color: white;
        }
        table {
            border-spacing: 5px;
        }
    </style>
</head>
<body>
<div>
    <div style="width: 20%; float: left;">
        <img style="height: 65px" src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/img/inegas-logo.png';?>"/>
    </div>
    <div style="width: 60%; float: left">
        <h2 align="center">Toma de inventario de Activos Fijos</h2>
    </div>
    <div style="width: 20%; float: left; border-left: 2px solid #687578; padding-left: 5px" align="center">

    </div>
    <div style="clear: both;" />
</div>
<br>
<div style="font-size: 12px">
    <div class="table-responsive">
        <table class="table table-hover table-striped ">
            <thead>
            <tr>
                <th><b>Codigo</b></th>
                <th><b>Marca</b></th>
                <th><b>Modelo</b></th>
                <th><b>Color</b></th>
                <th><b>N. Serie</b></th>
                <th><b>Ubicacion</b></th>
                <th><b>Responsable</b></th>
                <th><b>Observaciones</b></th>
            </tr>
            </thead>
            <tbody>
            @foreach($activos as $activo)
                <tr>
                    <td>{{$activo -> codigo}}</td>
                    <td>{{$activo -> marca}}</td>
                    <td>{{$activo -> modelo}}</td>
                    <td>{{$activo -> color}}</td>
                    <td>{{$activo -> serie}}</td>
                    <td>{{$activo -> area}} - {{$activo -> ubicacion}}</td>
                    <td>{{$activo -> responsable}}</td>
                    <td></td>
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
</div>
</body>
</html>