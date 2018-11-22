@extends('layouts.dashboard-suministros')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-boxes fa-2x"></i>
                    </div>
                    <h3 class="card-title">Inventario</h3>

                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-hover table-striped ">
                            <thead>
                                <tr>
                                    <th><b>#</b></th>
                                    <th><b>Nombre</b></th>
                                    <th><b>Stock</b></th>
                                    <th><b>U. Medida</b></th>
                                    <th><b>Categoria</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Papel Bond Carta</td>
                                    <td>50</td>
                                    <td>Paquete 500u</td>
                                    <td>Material de oficina</td>
                                </tr>

                                <tr class="table-warning">
                                    <td>2</td>
                                    <td>Papel Bond Oficio</td>
                                    <td>0</td>
                                    <td>Paquete 500u</td>
                                    <td>Material de oficina</td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>Papel Bond A4</td>
                                    <td>50</td>
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