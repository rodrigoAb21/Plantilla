<!DOCTYPE html>
<html lang="en">
<head>
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
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #8b8d88;
            color: white;
        }
        table {
            border-spacing: 5px;
            font-size: 12px;

        }

    </style>
</head>
<body>
<h2 align="center">Salida de Suministro</h2>
<div class="content">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-body ">
                            <div style="border-radius: 5px; border: 2px solid #687578; padding: 10px; font-size: 12px">
                                <div style="width: 10%; float: left">
                                    <label><b>ID</b></label>
                                    <p>{{$salida -> id}}</p>
                                </div>
                                <div style="width: 20%; float: left">
                                    <label><b>Estado</b></label>
                                    <p>{{$salida -> estado}}</p>
                                </div>
                                <div style="width: 20%; float: left">
                                    <label><b>Fecha</b></label>
                                    <p>{{$salida -> fecha}}</p>
                                </div>
                                <div style="width: 30%; float: left">
                                    <label><b>Ubicacion</b></label>
                                    <p>{{$salida -> ubicacion}}</p>
                                </div>
                                <div style="width: 20%; float: left">
                                    <label><b>Recibe</b></label>
                                    <p>{{$salida -> recibe}} - {{$salida -> cargo}}</p>
                                </div>
                                <div>
                                    <label><b>Observacion</b></label>
                                    <p>{{$salida -> observacion}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div style="border-radius: 5px; border: 2px solid #687578; padding: 10px">
                            <div class="card-header">
                                <h3>Detalle</h3>
                            </div>

                            <div class="table-responsive table-bordered table-hover table-striped">
                                <table class="table ">
                                    <thead>
                                    <tr>
                                        <th scope="col"><b>Suministro</b></th>
                                        <th width="20%" scope="col"><b>Cantidad</b></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($detalles as $detalle)
                                        <tr>
                                            <td>{{$detalle -> nombre}}</td>
                                            <td width="20%">{{$detalle -> cantidad}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                    <!--  end card  -->
                </div>
                <!-- end col-md-12 -->
            </div>
            <!-- end row -->
        </div>
    </div>
</div>

</body>
</html>