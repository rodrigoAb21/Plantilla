@extends('layouts.dashboard-activos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-dolly-flatbed fa-2x"></i>
                    </div>
                    <h3 class="card-title">Traslados de Activos</h3>

                </div>
                <div class="card-body">

                    <form method="GET" action="{{url('/act/reportes/traslados')}}" autocomplete="off">
                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                <label for="busqueda" class="bmd-label-floating">Buscar</label>
                                <input type="text" class="form-control" id="busqueda" value="{{$busqueda}}" name="busqueda">
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn-fab btn-round btn-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <a class="btn btn-fab btn-round btn-primary" href="{{url('/act/reportes/trasladosPDF')}}">
                                                <i class="fa fa-file-pdf"></i>
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
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($traslados as $traslado)
                                <tr>
                                    <td>{{$traslado -> id}}</td>
                                    <td>{{$traslado -> fecha}}</td>
                                    <td>{{$traslado -> ubicacion}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{$traslados -> appends(Request::except('page')) -> links('pagination.default')}}
                </div>
            </div>

            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->

@endsection