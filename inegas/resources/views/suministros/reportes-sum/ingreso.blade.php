@extends('layouts.dashboard-suministros')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-truck-loading fa-2x"></i>
                    </div>
                    <h3 class="card-title">Movimiento de Ingreso de Suministros</h3>

                </div>
                <div class="card-body">
                    <form method="GET" action="{{url('sum/reportes/movimientos/ingresos')}}" autocomplete="off">
                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                <label for="busqueda" class="bmd-label-floating">Buscar</label>
                                <input type="text" class="form-control" id="busqueda" name="busqueda" value="{{$busqueda}}" >
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn-fab btn-round btn-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    <a href="{{url('sum/reportes/movimientos/ingresosPDF')}}">
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
                                <th><b>N. Documento</b></th>
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