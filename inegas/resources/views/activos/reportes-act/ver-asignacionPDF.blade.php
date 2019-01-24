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
        }
    </style>
</head>
<body>
<br>
<div style="font-size: 12px; clear: both;" class="content">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div style="border-radius: 5px; border: 2px solid #687578; padding: 10px;">
                            <div style="width: 20%; float: left; border-right: 2px solid #687578">
                                <img style="height: 65px" src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/img/inegas-logo.png';?>"/>
                            </div>
                            <div style="width: 60%; float: left">
                                <h3 align="center">ASIGNACION DE ACTIVOS FIJOS</h3>
                            </div>
                            <div style="width: 20%; float: left; border-left: 2px solid #687578; padding-left: 5px" align="center">
                                <p>Codigo: {{$reporte -> codigo}}<br>Fecha: {{$reporte -> fecha}}<br>Revision: {{$reporte -> revision}}</p>
                            </div>
                            <div style="clear: both;" />
                        </div>
                        <br>
                        <div class="card-body ">
                            <div style="border-radius: 5px; border: 2px solid #687578; padding: 10px; overflow: auto; width: 100%; clear: both">
                                <div style="width: 20%; float: left">
                                    <label><b>N° Doc</b></label>
                                    <p>{{$asignacion -> fecha}}</p>
                                </div><div style="width: 20%; float: left">
                                    <label><b>Fecha</b></label>
                                    <p>{{$asignacion -> fecha}}</p>
                                </div>
                                <div style="width: 25%; float: left">
                                    <label><b>Ubicacion</b></label>
                                    <p>{{$asignacion -> area}} - {{$asignacion -> ubicacion}}</p>
                                </div>
                                <div style="width: 35%; float: left">
                                    <label ><b>Responsable</b></label>
                                    <p>{{$asignacion -> responsable}}</p>
                                </div>
                                <div>
                                    <label><b>Observacion</b></label>
                                    <p>{{$asignacion -> observacion}}</p>
                                </div>
                            </div>
                        </div>
                        <br style="clear: left;" />
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

                        <div style="width: 100%;padding-top: 7em; align-items: center; margin: auto">
                            <div style="width: 10%;float: left;"></div>
                            <div align="center" style="width: 20%; float: left;">
                                <hr>
                                <p><br> Entrega </p>
                            </div>
                            <div style="width: 10%;float: left;"></div>
                            <div align="center" style="width: 20%; float: left;">
                                <hr>
                                <p><br>Recibe</p>
                            </div><div style="width: 10%;float: left;"></div>
                            <div align="center" style="width: 20%; float: left;">
                                <hr>
                                <p><br>Autoriza</p>
                            </div>
                            <div style="width: 10%;float: left;"></div>
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