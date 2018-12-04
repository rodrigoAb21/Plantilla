@extends('layouts.dashboard-suministros')

@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-arrow-right fa-2x"></i>
                        </div>
                        <h3 class="card-title">Ingreso de Suministros</h3>
                    </div>

                    <div class="card-body ">

                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label>ID</label>
                                                <p>{{$ingreso -> id}}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Estado</label>
                                                <p>{{$ingreso -> estado}}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label >Fecha Ingreso</label>
                                                <p>{{$ingreso -> fecha_ingreso}}</p>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Proveedor</label>
                                                <p>{{$ingreso -> proveedor}}</p>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Nro Factura</label>
                                                <p>{{$ingreso -> nro_factura}}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Factura</label>
                                                <p>{{$ingreso -> fecha_factura}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label >Foto Factura</label>
                                            <p><img src="{{asset('img/suministros/ingresos/'.$ingreso -> foto_factura)}}" alt="{{$ingreso -> foto_factura}}" class="img-thumbnail" style="height: 100%; width: 100%"></p>
                                        </div>
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
                                    <th scope="col" class="w-50"><b>Suministro</b></th>
                                    <th scope="col"><b>Cantidad</b></th>
                                    <th scope="col"><b>Precio Uni. Bs</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($detalles as $detalle)
                                    <tr>
                                        <td>{{$detalle -> nombre}}</td>
                                        <td>{{$detalle -> cantidad}}</td>
                                        <td>{{$detalle -> precio_unitario}}</td>
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