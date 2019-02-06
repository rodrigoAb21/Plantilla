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
        <h2 align="center">KARDEX</h2>
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
                <th><b>Fecha</b></th>
                <th><b>Documento</b></th>
                <th><b>Movimiento</b></th>
                <th><b>Cantidad</b></th>
                <th><b>Saldo</b></th>
            </tr>
            </thead>
            <tbody>
            {{--@foreach($kardex as $k)--}}
                {{--<tr>--}}
                    {{--<td>{{Carbon\Carbon::parse($k -> fecha_mov)->format('d/m/Y h:i A')}}</td>--}}
                    {{--<td>{{$k -> id_mov}}</td>--}}
                    {{--<td>{{$k -> tipo_mov}}</td>--}}
                    {{--<td>{{$k -> cantidad}}</td>--}}
                    {{--<td>{{$k -> saldo}}</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
            </tbody>
        </table>
    </div>
</div>
</body>
</html>