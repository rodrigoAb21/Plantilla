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
        <h2 align="center">Inventario de Suministros</h2>
    </div>
    <div style="width: 20%; float: left; border-left: 2px solid #687578; padding-left: 5px" align="center">

    </div>
    <div style="clear: both;" />
</div>
<div style="font-size: 12px">
    <div class="table-responsive">
        <table class="table table-hover table-striped ">
            <thead>
            <tr>
                <th><b>COD</b></th>
                <th><b>Nombre</b></th>
                <th><b>Marca</b></th>
                <th><b>Stock</b></th>
                <th><b>Unidad de Medida</b></th>
                <th><b>Observacion</b></th>
            </tr>
            </thead>
            <tbody>
            @foreach($suministros as $suministro)
                    <tr class="table-warning">
                        <td>{{$suministro -> codigo}}</td>
                        <td>{{$suministro -> nombre}}</td>
                        <td>{{$suministro -> marca}}</td>
                        <td>{{$suministro -> stock}}</td>
                        <td>{{$suministro -> medida}}</td>
                        <td></td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>