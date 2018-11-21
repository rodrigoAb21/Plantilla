@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-box-open fa-2x"></i>
                    </div>
                    <h3 class="card-title">Suministros</h3>

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
                                        <a class="btn btn-fab btn-round btn-primary" href="{{url('suministros/create')}}">
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
                                    <th><b>U. Medida</b></th>
                                    <th><b>Categoria</b></th>
                                    <th><b>S. Max</b></th>
                                    <th><b>S. Min</b></th>
                                    <th class="text-right"><b>Opciones</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Papel Bond Carta</td>
                                    <td>Paquete 500u</td>
                                    <td>Material de oficina</td>
                                    <td>50</td>
                                    <td>10</td>
                                    <td class="text-right ">
                                        <button class="btn btn-outline-primary btn-sm" onclick="verSuministro()">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <a href="{{url('suministros/1/edit')}}">
                                            <button class="btn btn-outline-primary btn-sm">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminarSuministro('Papel Bond Carta', '{{url('suministros/1')}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>Papel Bond Oficio</td>
                                    <td>Paquete 500u</td>
                                    <td>Material de oficina</td>
                                    <td>50</td>
                                    <td>10</td>
                                    <td class="text-right ">
                                        <button class="btn btn-outline-primary btn-sm" onclick="verSuministro()">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <a href="{{url('suministros/1/edit')}}">
                                            <button class="btn btn-outline-primary btn-sm">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminarSuministro('Papel Bond Oficio', '{{url('suministros/1')}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>Papel Bond A4</td>
                                    <td>Paquete 500u</td>
                                    <td>Material de oficina</td>
                                    <td>50</td>
                                    <td>10</td>
                                    <td class="text-right ">
                                        <button class="btn btn-outline-primary btn-sm" onclick="verSuministro()">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <a href="{{url('suministros/1/edit')}}">
                                            <button class="btn btn-outline-primary btn-sm">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminarSuministro('Papel Bond A4', '{{url('suministros/1')}}')">
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
    @include('suministros.suministros.show')
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