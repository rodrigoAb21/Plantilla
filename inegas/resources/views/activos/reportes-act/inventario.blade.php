@extends('layouts.dashboard-activos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-boxes fa-2x"></i>
                    </div>
                    <h3 class="card-title">Inventario de Activos</h3>

                </div>
                <div class="card-body">
                    <form method="GET" action="{{url('act/reportes/inventario')}}" autocomplete="off">
                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                <label for="busqueda" class="bmd-label-floating">Buscar</label>
                                <input type="text" class="form-control" id="busqueda" name="busqueda" value="{{$busqueda}}" >
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn-fab btn-round btn-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <a href="{{url('/act/reportes/inventarioPDF')}}">
                                            <button type="button" class="btn btn-fab btn-round btn-primary" title="Descargar PDF" >
                                                <i class="fa fa-file-pdf"></i>
                                            </button>
                                        </a>
                                        <a href="{{url('/act/reportes/inventario2PDF')}}">
                                            <button type="button" class="btn btn-fab btn-round btn-primary" title="Descargar PDF" >
                                                <i class="fa fa-clipboard-list"></i>
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
                                <th><b>Codigo</b></th>
                                <th><b>Marca</b></th>
                                <th><b>Modelo</b></th>
                                <th><b>Color</b></th>
                                <th><b>N. Serie</b></th>
                                <th><b>Ubicacion</b></th>
                                <th><b>Responsable</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($activos as $activo)
                                @if($activo -> disponibilidad != 'Baja')
                                    <tr>
                                        <td>{{$activo -> codigo}}</td>
                                        <td>{{$activo -> marca}}</td>
                                        <td>{{$activo -> modelo}}</td>
                                        <td>{{$activo -> color}}</td>
                                        <td>{{$activo -> serie}}</td>
                                        <td>{{$activo -> area}} - {{$activo -> ubicacion}}</td>
                                        <td>{{$activo -> responsable}}</td>
                                    </tr>
                                @else
                                    <tr class="table-danger">
                                        <td>{{$activo -> codigo}}</td>
                                        <td>{{$activo -> marca}}</td>
                                        <td>{{$activo -> modelo}}</td>
                                        <td>{{$activo -> color}}</td>
                                        <td>{{$activo -> serie}}</td>
                                        <td>{{$activo -> ubicacion}}</td>
                                        <td>{{$activo -> responsable}}</td>
                                    </tr>
                                @endif
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{$activos -> appends(Request::except('page')) -> links('pagination.default')}}
                </div>
            </div>

            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->

@endsection