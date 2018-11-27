@extends('layouts.dashboard-activos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-boxes fa-2x"></i>
                    </div>
                    <h3 class="card-title">Inventario de Activos</h3>

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
                                    <a href="">
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
                                    <th><b>#</b></th>

                                    <th><b>Nombre</b></th>
                                    <th><b>Ubicación</b></th>
                                    <th><b>Categoría</b></th>
                                    <th><b>Costo</b></th>
                                    <th><b>Estado</b></th>


                                    <th><b>Foto</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mesa</td>
                                    <td>Finanzas</td>
                                    <td>Muebles</td>
                                </tr>

                                <tr class="table-warning">
                                    <td>2</td>
                                    <td>Papel Bond Oficio</td>
                                    <td>Paquete 500u</td>
                                    <td>Material de oficina</td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>Papel Bond A4</td>
                                    <td>Paquete 500u</td>
                                    <td>Material de oficina</td>
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