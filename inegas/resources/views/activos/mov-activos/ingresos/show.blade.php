@extends('layouts.dashboard-activos')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-angle-double-right fa-2x"></i>
                    </div>
                    <h3 class="card-title">Ingreso de Activos Fijos</h3>
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
                            <tbody>
                            @foreach($activos as $activo)
                                <tr id="fila-cont">
                                    <td>
                                        <div>
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail img-raised" style="height: 80%; width: 80%">
                                                                <img src="{{asset('img/activos/activos/'.$activo -> foto)}}"  alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                        <div class="row">
                                                            <div class="col-lg-10 col-md-10 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>Linea - Grupo</label>
                                                                    <p>{{$activo -> linea.' - '.$activo -> grupo}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>Costo</label>
                                                                    <p>{{$activo -> costo_ingreso}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>Marca</label>
                                                                    <p>{{$activo -> marca}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>Nro Serie</label>
                                                                    <p>{{$activo -> serie}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>Modelo</label>
                                                                    <p>{{$activo -> modelo}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>Color</label>
                                                                    <p>{{$activo -> color}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>Caracteristicas</label>
                                                                    <p>{{$activo -> caracteristicas}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
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