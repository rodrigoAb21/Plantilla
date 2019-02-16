@extends('layouts.dashboard-activos')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-angle-double-right fa-2x"></i>
                    </div>
                    <h3 class="card-title">Activo Fijo: {{$activo -> codigo}}</h3>
                </div>

                <div class="card-body ">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail img-raised" style="height: 80%; width: 80%">
                                        <img src="{{asset('img/activos/activos/'.$activo -> foto)}}"  alt="...">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Linea - Grupo</label>
                                            <p>{{$activo -> linea.' - '.$activo -> grupo}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Costo Ingreso</label>
                                            <p>{{$activo -> costo_ingreso}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Costo Actual</label>
                                            <p>{{$activo -> costo_actual}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Marca</label>
                                            <p>{{$activo -> marca}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Nro Serie</label>
                                            <p>{{$activo -> serie}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Modelo</label>
                                            <p>{{$activo -> modelo}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
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
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Ubicacion</label>
                                            <p>{{$activo -> nombre}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->
@endsection