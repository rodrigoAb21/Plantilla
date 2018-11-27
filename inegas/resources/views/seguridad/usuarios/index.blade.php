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
                    <form action="">
                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                    <label for="busqueda" class="bmd-label-floating">Buscar</label>
                                    <input type="text" class="form-control" id="busqueda" name="busqueda">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-fab btn-round btn-primary">
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
                                    <th><b>#</b></th>
                                    <th><b>CI</b></th>
                                    <th><b>Nombre</b></th>
                                    <th><b>Area</b></th>
                                    <th><b>Estado</b></th>
                                    <th class="text-right"><b>Opciones</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>8181035</td>
                                    <td>Juan Perez</td>
                                    <td>Administrador</td>
                                    <td>Habilitado</td>
                                    <td class="text-right ">
                                        <a href="{{url('seg/usuarios/1/edit')}}">
                                            <button class="btn btn-outline-primary btn-sm">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminarModelo('Juan Perez', '{{url('seg/usuarios/1')}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>4865218</td>
                                    <td>Jose Tola</td>
                                    <td>Activos Fijos</td>
                                    <td>Habilitado</td>
                                    <td class="text-right ">
                                        <a href="{{url('seg/usuarios/1/edit')}}">
                                            <button class="btn btn-outline-primary btn-sm">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminarModelo('Jose Tola', '{{url('seg/usuarios/1')}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>3292605</td>
                                    <td>Marcos Claros</td>
                                    <td>Suministros</td>
                                    <td>Habilitado</td>
                                    <td class="text-right ">
                                        <a href="{{url('seg/usuarios/1/edit')}}">
                                            <button class="btn btn-outline-primary btn-sm">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminarModelo('Marcos Claros', '{{url('seg/usuarios/1')}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>8846559</td>
                                    <td>Pedro Suarez</td>
                                    <td>Activos Fijos</td>
                                    <td>Deshabilitado</td>
                                    <td class="text-right ">
                                        <a href="{{url('seg/usuarios/1/edit')}}">
                                            <button class="btn btn-outline-primary btn-sm" disabled>
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-outline-primary btn-sm" title="Habilitar" onclick="habilitarModelo('Pedro Suarez', '{{url('seg/usuarios/1')}}')">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <nav class="mr-0 ml-auto">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">ANT</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">SIG</a>
                            </li>
                        </ul>
                    </nav>
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
                $('#modalEliminarTitulo').html("Deshabilitar Usuario");
                $('#modalEliminarEnunciado').html("Realmente desea deshabilitar al usuario: " + nombre + "?");
                $('#modalEliminar').modal('show');

            }

            function habilitarModelo(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#modalEliminarTitulo').html("Habilitar Usuario");
                $('#modalEliminarEnunciado').html("Realmente desea habilitar al usuario: " + nombre + "?");
                $('#modalEliminar').modal('show');

            }

        </script>

    @endpush()

@endsection