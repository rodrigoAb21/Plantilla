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
<div>
    <div style="width: 20%; float: left;">
        <img style="height: 65px" src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/img/inegas-logo.png';?>"/>
    </div>
    <div style="width: 60%; float: left">
        <h2 align="center">Salida de Suministro</h2>
    </div>
    <div style="width: 20%; float: left; border-left: 2px solid #687578; padding-left: 5px" align="center">

    </div>
    <div style="clear: both;" />
</div>
<div class="content" style="font-size: 12px">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-body ">
                            <div style="border-radius: 5px; border: 2px solid #687578; padding: 10px;">
                                <div style="width: 10%; float: left">
                                    <label><b>N° Doc</b></label>
                                    <p>{{$salida -> id}}</p>
                                </div>
                                <div style="width: 20%; float: left">
                                    <label><b>Fecha</b></label>
                                    <p>{{$salida -> fecha}}</p>
                                </div>
                                <div style="width: 30%; float: left">
                                    <label><b>Ubicacion</b></label>
                                    <p>{{$salida -> area}} - {{$salida -> ubicacion}}</p>
                                </div>
                                <div style="width: 20%; float: left">
                                    <label><b>Recibe</b></label>
                                    <p>{{$salida -> recibe}}</p>
                                </div>
                                <div style="width: 20%; float: left">
                                    <label><b>Emitido</b></label>
                                    <p>{{$salida -> emitido}}</p>
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

                        {{--Pie de firma--}}
                        <div style="width: 100%;padding-top: 5em; align-items: center; margin: auto">
                            <div style="width: 10%;float: left;"></div>
                            <div align="center" style="width: 30%; float: left;">
                                <hr>
                                <p>{{\Illuminate\Support\Facades\Auth::user()->nombre}} <br> Entrega </p>
                            </div>
                            <div style="width: 20%;float: left;"></div>
                            <div align="center" style="width: 30%; float: left;">
                                <hr>
                                <p>{{$salida -> recibe}} <br>Recibe</p>
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