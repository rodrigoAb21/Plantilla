@extends('layouts.dashboard-seguridad')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-users fa-2x"></i>
                    </div>
                    <h3 class="card-title">Usuarios</h3>

                </div>
                <div class="card-body">
                    <form method="GET" action="{{url('seg/usuarios')}}" autocomplete="off">
                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                    <label for="busqueda" class="bmd-label-floating">Buscar</label>
                                    <input type="text" class="form-control" id="busqueda" name="busqueda">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-fab btn-round btn-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <a class="btn btn-fab btn-round btn-primary" href="{{url('seg/usuarios/create')}}">
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
                                    <th><b>Estado</b></th>
                                    <th class="text-right"><b>Opciones</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usuarios as $usuario)
                                    <tr>
                                        <td>{{$usuario -> id}}</td>
                                        <td>{{$usuario -> nombre}}</td>
                                        <td>{{$usuario -> cargo}}</td>
                                        <td>{{$usuario -> area}}</td>
                                        <td>{{$usuario -> estado}}</td>
                                        <td class="text-right ">
                                            <a href="{{url('seg/usuarios/'.$usuario -> id.'/edit')}}">
                                                <button class="btn btn-outline-primary btn-sm">
                                                    <i class="fa fa-pen"></i>
                                                </button>
                                            </a>
                                            @if($usuario -> estado == "Habilitado")
                                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="modalEliminar('{{$usuario -> nombre}}', '{{url('seg/usuarios/'.$usuario -> id)}}')">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="modalHabilitar('{{$usuario -> nombre}}', '{{url('/seg/usuarios/'.$usuario -> id.'/habilitar')}}')">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{$usuarios->links('pagination.default')}}
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
                $('#modalEliminarTitulo').html("Deshabilitar Usuario");
                $('#modalEliminarEnunciado').html("Realmente desea deshabilitar al usuario: " + nombre + "?");
                $('#modalEliminar').modal('show');

            }

            function modalHabilitar(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#metodo').val("patch");
                $('#modalEliminarTitulo').html("Habilitar Usuario");
                $('#modalEliminarEnunciado').html("Realmente desea habilitar al usuario: " + nombre + "?");
                $('#modalEliminar').modal('show');

            }

        </script>

    @endpush()

@endsection