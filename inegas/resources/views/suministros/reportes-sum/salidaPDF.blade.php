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
<body style="font-family: sans-serif";>
<h2 align="center">Movimiento de salidas de Suministros</h2>
<div style="font-size: 12px">
    <div class="table-responsive">
        <table class="table table-hover table-striped ">
            <thead>
            <tr>
                <th><b>N. Doc</b></th>
                <th><b>Fecha</b></th>
                <th><b>Ubicacion</b></th>
                <th><b>Recibe</b></th>
                <th><b>Estado</b></th>
                <th><b>Emitido</b></th>
            </tr>
            </thead>
            <tbody>
            @foreach($salidas as $salida)
                <tr>
                    <td>{{$salida -> id}}</td>
                    <td>{{Carbon\Carbon::parse($salida -> fecha)->format('d/m/Y h:i A')}}</td>
                    <td>{{$salida -> area}} - {{$salida -> ubicacion}}</td>
                    <td>{{$salida -> recibe}}</td>
                    <td>{{$salida -> estado}}</td>
                    <td>{{$salida -> emitido}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>