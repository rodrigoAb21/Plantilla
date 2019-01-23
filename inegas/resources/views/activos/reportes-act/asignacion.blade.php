@extends('layouts.dashboard-activos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-truck-loading fa-2x"></i>
                    </div>
                    <h3 class="card-title">Asignaciones de Activos</h3>

                </div>
                <div class="card-body">
                    <form method="GET" action="{{url('act/reportes/asignaciones')}}" autocomplete="off">
                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                <label for="busqueda" class="bmd-label-floating">Buscar</label>
                                <input type="text" class="form-control" id="busqueda" name="busqueda" value="{{$busqueda}}" >
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn-fab btn-round btn-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    <a href="{{url('/act/reportes/asignacionesPDF')}}">
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
                                <th><b>Ubicacion</b></th>
                                <th><b>Responsable</b></th>
                                <th class="text-right w-25"><b>Opciones</b></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($asignaciones as $traslado)
                                <tr>
                                    <td>{{$traslado -> id}}</td>
                                    <td>{{$traslado -> fecha}}</td>
                                    <td>{{$traslado -> area}} - {{$traslado -> ubicacion}}</td>
                                    <td>{{$traslado -> responsable}}</td>
                                    <td class="text-right ">
                                        <a href="{{url('act/reportes/asignaciones/'.$traslado -> id)}}">
                                            <button class="btn btn-outline-primary btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{url('act/reportes/asignaciones/'.$traslado -> id.'/PDF')}}">
                                            <button class="btn btn-outline-primary btn-sm">
                                                <i class="fa fa-file-pdf"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                   {{$asignaciones -> links('pagination.default')}}
                </div>
            </div>

            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->

@endsection