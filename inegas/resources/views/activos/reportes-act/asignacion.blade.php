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
                    <h3 class="card-title">Asignaciones de Activos</h3>

                </div>
                <div class="card-body">
                    <form action="">
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
                                    <a href="{{url('/act/reportes/movimientos/asignacionesPDF')}}">
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
                                <th><b>Responsable</b></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($asignaciones as $traslado)
                                <tr>
                                    <td>{{$traslado -> id}}</td>
                                    <td>{{$traslado -> fecha}}</td>
                                    <td>{{$traslado -> responsable}}</td>
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