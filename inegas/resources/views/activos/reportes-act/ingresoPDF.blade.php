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
        <h2 align="center">Ingresos de Activos Fijos</h2>
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
                <th><b>N° Doc</b></th>
                <th><b>Fecha</b></th>
                <th><b>Proveedor</b></th>
                <th><b>Nro Factura</b></th>
                <th><b>Estado</b></th>
                <th><b>Emitido</b></th>
            </tr>
            </thead>
            <tbody>
            @foreach($ingresos as $ingreso)
                <tr>
                    <td>{{$ingreso -> id}}</td>
                    <td>{{Carbon\Carbon::parse($ingreso -> fecha_ingreso)->format('d/m/Y h:i A')}}</td>
                    <td>{{$ingreso -> proveedor}}</td>
                    <td>{{$ingreso -> nro_factura}}</td>
                    <td>{{$ingreso -> estado}}</td>
                    <td>{{$ingreso -> emitido}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>