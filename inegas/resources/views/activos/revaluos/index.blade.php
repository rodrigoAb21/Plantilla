@extends('layouts.dashboard-activos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-file-invoice-dollar fa-2x"></i>
                    </div>
                    <h3 class="card-title">Revaluos</h3>

                </div>
                <div class="card-body">

                    <form method="GET" action="{{url('act/revaluos')}}" autocomplete="off">
                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                <label for="busqueda" class="bmd-label-floating">Buscar</label>
                                <input type="text" class="form-control" id="busqueda" value="{{$busqueda}}" name="busqueda">
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn-fab btn-round btn-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <a class="btn btn-fab btn-round btn-primary" href="{{url('act/revaluos/create')}}">
                                                <i class="fa fa-plus"></i>
                                        </a>
                                    </span>

                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover table-striped ">
                            <thead>
                                <tr>
                                    <th><b>#</b></th>
                                    <th><b>Fecha</b></th>
                                    <th><b>Codigo</b></th>
                                    <th><b>Tipo</b></th>
                                    <th><b>Estado</b></th>
                                    <th class="text-right"><b>Opciones</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($revaluos as $revaluo)
                                    <tr>
                                        <td>{{$revaluo -> id}}</td>
                                        <td>{{Carbon\Carbon::parse($revaluo -> fecha)->format('d/m/Y h:i A')}}</td>
                                        <td>{{$revaluo -> codigo}}</td>
                                        <td>{{$revaluo -> tipo}}</td>
                                        <td>{{$revaluo -> estado}}</td>
                                        <td class="text-right ">
                                            <a href="{{url('act/revaluos/'.$revaluo -> id)}}">
                                                <button class="btn btn-outline-primary btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminarSuministro('{{$revaluo -> id}}', '{{url('act/revaluos/'.$revaluo -> id)}}')">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{$revaluos -> links('pagination.default')}}
                </div>
            </div>

            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->

    @include('modal')
    @push('scripts')
        <script>

            function eliminarSuministro(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#modalEliminarTitulo').html("Eliminar Suministro");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar el suministro: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }

        </script>

    @endpush()

@endsection