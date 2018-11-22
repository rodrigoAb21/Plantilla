@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-arrow-left fa-2x"></i>
                    </div>
                    <h3 class="card-title">Salida de Suministros</h3>

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
                                        <a class="btn btn-fab btn-round btn-primary" href="{{url('mov-suministros/salidas/create')}}">
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
                                    <th><b>Departamento</b></th>
                                    <th><b>Estado</b></th>
                                    <th class="text-right"><b>Opciones</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>20/11/2018 10:09</td>
                                    <td>Finanzas</td>
                                    <td>Realizado</td>
                                    <td class="text-right ">
                                        <a href="{{url('mov-suministros/salidas/1')}}">
                                            <button class="btn btn-outline-primary btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminarModelo('1', '{{url('mov-suministros/salidas/1')}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>20/11/2018 16:21</td>
                                    <td>RR.HH.</td>
                                    <td>Realizado</td>
                                    <td class="text-right ">
                                        <a href="{{url('mov-suministros/salidas/1')}}">
                                            <button class="btn btn-outline-primary btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminarModelo('4', '{{url('mov-suministros/salidas/1')}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>20/11/2018 17:47</td>
                                    <td>Publicidad</td>
                                    <td>Anulado</td>
                                    <td class="text-right ">
                                        <a href="{{url('mov-suministros/salidas/1')}}">
                                            <button class="btn btn-outline-primary btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-outline-primary btn-sm disabled" onclick="eliminarModelo('7', '{{url('mov-suministros/salidas/1')}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>21/11/2018 09:34</td>
                                    <td>Administracion</td>
                                    <td>Realizado</td>
                                    <td class="text-right ">
                                        <a href="{{url('mov-suministros/salidas/1')}}">
                                            <button class="btn btn-outline-primary btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminarModelo('8', '{{url('mov-suministros/salidas/1')}}')">
                                            <i class="fa fa-times"></i>
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
                $('#modalEliminarTitulo').html("Anular Ingreso de suministro");
                $('#modalEliminarEnunciado').html("Realmente desea anular la salida Nro: " + nombre + "?");
                $('#modalEliminar').modal('show');

            }

        </script>

    @endpush()

@endsection