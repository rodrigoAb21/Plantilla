@extends('layouts.dashboard-seguridad')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-user-tie fa-2x"></i>
                    </div>
                    <h3 class="card-title">Trabajadores</h3>

                </div>
                <div class="card-body">

                    <form method="GET" action="{{url('seg/trabajadores')}}" autocomplete="off">
                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                <label for="busqueda" class="bmd-label-floating">Buscar</label>
                                <input type="text" class="form-control" value="{{$busqueda}}" id="busqueda" name="busqueda">
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn-fab btn-round btn-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <a class="btn btn-fab btn-round btn-primary" href="{{url('seg/trabajadores/create')}}">
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
                                    <th><b>ID</b></th>
                                    <th><b>Nombre</b></th>
                                    <th><b>Cargo</b></th>
                                    <th><b>Area</b></th>
                                    <th class="text-right"><b>Opciones</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trabajadores as $trab)
                                    <tr>
                                        <td>{{$trab -> id}}</td>
                                        <td>{{$trab -> nombre}}</td>
                                        <td>{{$trab -> cargo}}</td>
                                        <td>{{$trab -> area}}</td>
                                        <td class="text-right ">
                                            <a href="{{url('seg/trabajadores/'.$trab -> id.'/edit')}}">
                                                <button class="btn btn-outline-primary btn-sm">
                                                    <i class="fa fa-pen"></i>
                                                </button>
                                            </a>
                                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="modalEliminar('{{$trab -> nombre}}', '{{url('seg/trabajadores/'.$trab -> id)}}')">
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
                    {{$trabajadores->links('pagination.default')}}
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

            function modalEliminar(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#metodo').val("delete");
                $('#modalEliminarTitulo').html("Eliminar Trabajador");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar al trabajador: " + nombre + "?");
                $('#modalEliminar').modal('show');

            }

        </script>

    @endpush()

@endsection