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
<h2 align="center">Inventario de Suministros</h2>
<div>
    <div class="table-responsive">
        <table class="table table-hover table-striped ">
            <thead>
            <tr>
                <th><b>COD</b></th>
                <th><b>Nombre</b></th>
                <th><b>Marca</b></th>
                <th><b>Stock</b></th>
                <th><b>Stock Min</b></th>
                <th><b>Presentacion</b></th>
                <th><b>Linea-Grupo</b></th>
            </tr>
            </thead>
            <tbody>
            @foreach($suministros as $suministro)
                    <tr class="table-warning">
                        <td>{{$suministro -> codigo}}</td>
                        <td>{{$suministro -> nombre}}</td>
                        <td>{{$suministro -> marca}}</td>
                        <td>{{$suministro -> stock}}</td>
                        <td>{{$suministro -> stock_minimo}}</td>
                        <td>{{$suministro -> medida}}</td>
                        <td>{{$suministro -> linea.' - '.$suministro -> grupo}}</td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>