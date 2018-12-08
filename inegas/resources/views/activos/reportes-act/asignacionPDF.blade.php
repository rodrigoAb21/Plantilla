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
<h2 align="center">Asignaciones de Activos</h2>
<div>
    <div class="table-responsive">
        <table class="table table-hover table-striped ">
            <thead>
            <tr>
                <th><b>ID</b></th>
                <th><b>Fecha</b></th>
                <th><b>Responsable</b></th>
            </tr>
            </thead>
            <tbody>

            @foreach($asignaciones as $traslado)
                <tr>
                    <td>{{$traslado -> id}}</td>
                    <td>{{$traslado -> fecha}}</td>
                    <td>{{$traslado -> responsable}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>
</body>
</html>