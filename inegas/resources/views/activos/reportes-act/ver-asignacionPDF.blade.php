<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{
            padding-top: 15px;
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
        }
    </style>
</head>
<body>
<div class="content">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-body ">
                            <div style="border-radius: 5px; border: 2px solid #687578; padding: 10px">
                                <h3>Asignacion</h3>
                                <div style="width: 10%; float: left">
                                    <label><b>ID</b></label>
                                    <p>{{$asignacion -> id}}</p>
                                </div>
                                <div style="width: 20%; float: left">
                                    <label><b>Fecha</b></label>
                                    <p>{{$asignacion -> fecha}}</p>
                                </div>
                                <div style="width: 20%; float: left">
                                    <label><b>Ubicacion</b></label>
                                    <p>{{$asignacion -> ubicacion}}</p>
                                </div>
                                <div style="width: 30%; float: left">
                                    <label ><b>Responsable</b></label>
                                    <p>{{$asignacion -> responsable}}</p>
                                </div>
                                <div style="width: 20%; float: left">
                                    <label ><b>Cargo</b></label>
                                    <p>{{$asignacion -> cargo}}</p>
                                </div>
                                <div>
                                    <label><b>Observacion</b></label>
                                    <p>{{$asignacion -> observacion}}</p>
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
                                        <th scope="col" ><b>#</b></th>
                                        <th scope="col"><b>Activo Fijo</b></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($activos as $activo)
                                        <tr>
                                            <td>{{$loop -> iteration}}</td>
                                            <td>{{'COD: '.$activo -> codigo.', '.$activo -> linea.' - '.$activo -> grupo}}</td>
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