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

                    <form action="">
                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                    <label for="busqueda" class="bmd-label-floating">Buscar</label>
                                    <input type="text" class="form-control" id="busqueda" name="busqueda">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-fab btn-round btn-primary">
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
                                    <th><b>Activo</b></th>
                                    <th><b>Tipo</b></th>
                                    <th><b>Estado</b></th>
                                    <th class="text-right"><b>Opciones</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>18-11-2018 10:00</td>
                                    <td>Activo 1 - 1</td>
                                    <td>Decremento</td>
                                    <td>Realizado</td>
                                    <td class="text-right ">
                                        <button class="btn btn-outline-primary btn-sm" onclick="verSuministro()">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminarSuministro('Papel Bond Carta', '{{url('act/revaluos/1')}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>18-11-2018 10:00</td>
                                    <td>Activo 2</td>
                                    <td>Incremento</td>
                                    <td>Anulado</td>
                                    <td class="text-right ">
                                        <button class="btn btn-outline-primary btn-sm" onclick="verSuministro()">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-primary btn-sm disabled" onclick="eliminarSuministro('Papel Bond Carta', '{{url('act/revaluos/1')}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>18-11-2018 10:00</td>
                                    <td>Activo 3</td>
                                    <td>Decremento</td>
                                    <td>Realizado</td>
                                    <td class="text-right ">
                                        <button class="btn btn-outline-primary btn-sm" onclick="verSuministro()">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminarSuministro('Papel Bond Carta', '{{url('act/revaluos/1')}}')">
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
    @include('activos.revaluos.show')
    @push('scripts')
        <script>

            function eliminarSuministro(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#modalEliminarTitulo').html("Eliminar Suministro");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar el suministro: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }

            function verSuministro() {
                $('#modalVer').modal('show');
            }

        </script>

    @endpush()

@endsection