@extends('layouts.dashboard-activos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-tags fa-2x"></i>
                    </div>
                    <h3 class="card-title">Grupos</h3>

                </div>
                <div class="card-body">

                    <form method="GET" action="{{url('act/grupos')}}" autocomplete="off">
                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                <label for="busqueda" class="bmd-label-floating">Buscar</label>
                                <input type="text" class="form-control" id="busqueda" name="busqueda" value="{{$busqueda}}" >
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn-fab btn-round btn-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <a class="btn btn-fab btn-round btn-primary" href="{{url('act/grupos/create')}}">
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
                                    <th><b>Nombre</b></th>
                                    <th class="text-right"><b>Opciones</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($grupos as $grupo)
                                    <tr>
                                        <td>{{$grupo -> id}}</td>
                                        <td>{{$grupo -> nombre}}</td>
                                        <td class="text-right ">
                                            <a href="{{url('act/grupos/'.$grupo -> id.'/edit')}}">
                                                <button class="btn btn-outline-primary btn-sm">
                                                    <i class="fa fa-pen"></i>
                                                </button>
                                            </a>
                                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminarModelo('{{$grupo -> nombre}}', '{{url('act/grupos/'.$grupo -> id)}}')">
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
                    {{$grupos -> links('pagination.default')}}
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

            function eliminarModelo(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#modalEliminarTitulo').html("Eliminar Grupo");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar el Grupo: " + nombre + "?");
                $('#modalEliminar').modal('show');

            }

        </script>

    @endpush()

@endsection