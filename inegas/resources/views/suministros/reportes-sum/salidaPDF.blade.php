<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Lista de Productos </title>
    <style>
        body{
            padding-top: 15px;
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
<div>
    <div class="table-responsive">
        <table class="table table-hover table-striped ">
            <thead>
            <tr>
                <th><b>ID</b></th>
                <th><b>Fecha</b></th>
                <th><b>Ubicacion</b></th>
                <th><b>Recibe</b></th>
                <th><b>Estado</b></th>
            </tr>
            </thead>
            <tbody>
            @foreach($salidas as $salida)
                <tr>
                    <td>{{$salida -> id}}</td>
                    <td>{{Carbon\Carbon::parse($salida -> fecha)->format('d/m/Y h:i A')}}</td>
                    <td>{{$salida -> ubicacion}}</td>
                    <td>{{$salida -> recibe}}</td>
                    <td>{{$salida -> estado}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>