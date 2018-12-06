@extends('layouts.dashboard-activos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-file-invoice-dollar fa-2x"></i>
                    </div>
                    <h3 class="card-title">Ver Revaluo: {{$revaluo -> id}}</h3>
                </div>

                    <div class="card-body ">
                        <div class="row">

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label>Fecha</label>
                                    </div>
                                    <p>{{Carbon\Carbon::parse($revaluo -> fecha)->format('d/m/Y h:i A')}}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label>Codigo Activo</label>
                                    </div>
                                    <p>{{$revaluo -> codigo}}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label>Monto del Revaluo</label>
                                    </div>
                                    <p>{{$revaluo -> monto}}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label>Grupo del Activo</label>
                                    </div>
                                    <p>{{$revaluo -> grupo}}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label>Costo Anterior</label>
                                    </div>
                                    <p>{{$revaluo -> costo_actual - $revaluo -> monto}}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label>Nuevo Costo</label>
                                    </div>
                                    <p>{{$revaluo -> costo_actual}}</p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Motivo</label>
                                    <p>{{$revaluo -> motivo}}</p>
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
