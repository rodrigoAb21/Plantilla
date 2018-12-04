@extends('layouts.dashboard-suministros')

@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-arrow-left fa-2x"></i>
                        </div>
                        <h3 class="card-title">Salida de Suministros</h3>
                    </div>

                    <div class="card-body ">

                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label>ID</label>
                                        <p>{{$salida -> id}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <p>{{$salida -> estado}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label >Fecha</label>
                                        <p>{{$salida -> fecha}}</p>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label>Ubicacion</label>
                                        <p>{{$salida -> ubicacion}}</p>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label>Recibe</label>
                                        <p>{{$salida -> recibe}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Observacion</label>
                                        <p>{{$salida -> observacion}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card ">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-clipboard-list fa-2x"></i>
                        </div>
                        <h3 class="card-title">Detalle</h3>
                    </div>

                    <div class="card-body ">
                        <div class="table-responsive table-bordered table-hover table-striped">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th scope="col" class="w-75"><b>Suministro</b></th>
                                    <th scope="col"><b>Cantidad</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($detalles as $detalle)
                                    <tr>
                                        <td>{{$detalle -> nombre}}</td>
                                        <td>{{$detalle -> cantidad}}</td>
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
@endsection