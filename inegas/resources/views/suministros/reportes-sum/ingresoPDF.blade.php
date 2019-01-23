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
<h2 align="center">Movimientos de Ingresos de Suministros</h2>
<div style="font-size: 12px">
    <div class="table-responsive">
        <table class="table table-hover table-striped ">
            <thead>
            <tr>
                <th><b>N. Documento</b></th>
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