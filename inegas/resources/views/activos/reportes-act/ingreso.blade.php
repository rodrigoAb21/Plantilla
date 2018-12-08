@extends('layouts.dashboard-activos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="text-right">Visitas: {{$visitas -> cant}}</p>
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-truck-loading fa-2x"></i>
                    </div>
                    <h3 class="card-title">Ingresos de Activos Fijos</h3>

                </div>
                <div class="card-body">
                    <form method="GET" action="{{url('/act/reportes/ingresos')}}" autocomplete="off">
                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="form-group mt-2">
                                        <div class="mb-1">
                                            <label for="inicio">Desde</label>
                                        </div>
                                        <input type="date" class="form-control" id="inicio" name="inicio">
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="form-group mt-2">
                                        <div class="mb-1">
                                            <label for="fin">Hasta</label>
                                        </div>
                                        <input type="date" class="form-control" id="fin" name="fin">
                                    </div>
                                </div>

                                <span class="input-group-btn pt-4 ml-auto mr-0">
                                <button type="button" class="btn btn-fab btn-round btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                                    <a href="{{url('/act/reportes/ingresosPDF')}}">
                                        <button type="button" class="btn btn-fab btn-round btn-primary" title="Descargar PDF" >
                                            <i class="fa fa-file-pdf"></i>
                                        </button>
                                    </a>
                            </span>


                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped ">
                            <thead>
                            <tr>
                                <th><b>ID</b></th>
                                <th><b>Fecha</b></th>
                                <th><b>Proveedor</b></th>
                                <th><b>Nro Factura</b></th>
                                <th><b>Estado</b></th>
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
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                   {{$ingresos -> links('pagination.default')}}
                </div>
            </div>

            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->

@endsection