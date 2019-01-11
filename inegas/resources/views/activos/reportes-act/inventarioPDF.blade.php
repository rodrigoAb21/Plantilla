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
<h2 align="center">Inventario de Activos Fijos</h2>
<div style="font-size: 12px">
    <div class="table-responsive">
        <table class="table table-hover table-striped ">
            <thead>
            <tr>
                <th><b>Codigo</b></th>
                <th><b>Serie</b></th>
                <th><b>Linea - Grupo</b></th>
            </tr>
            </thead>
            <tbody>
            @foreach($activos as $activo)
                <tr>
                    <td>{{$activo -> codigo}}</td>
                    <td>{{$activo -> serie}}</td>
                    <td>{{$activo -> linea.' - '.$activo -> grupo}}</td>
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
</div>
</body>
</html>