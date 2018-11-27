@extends('layouts.dashboard-seguridad')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-user-clock fa-2x"></i>
                    </div>
                    <h3 class="card-title">Bitacora</h3>

                </div>
                <div class="card-body">

                    <form action="">
                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="form-group mt-2">
                                        <div class="mb-1">
                                            <label for="inicio">Desde</label>
                                        </div>
                                        <input type="date" class="form-control" id="inicio" name="inicio">
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="form-group mt-2">
                                        <div class="mb-1">
                                            <label for="fin">Hasta</label>
                                        </div>
                                        <input type="date" class="form-control" id="fin" name="fin">
                                    </div>
                                </div>

                                <span class="input-group-btn pt-4 ml-auto mr-0">
                                <button type="button" class="btn btn-fab btn-round btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
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
                                    <th><b>Accion</b></th>
                                    <th><b>Usuario</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>15/11/2018 12:04</td>
                                    <td>Crear: Unidad de Medida --> ID:3</td>
                                    <td>Juan Perez</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>15/11/2018 14:21</td>
                                    <td>Editar: Unidad de Medida --> ID:3</td>
                                    <td>Juan Perez</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>15/11/2018 14:27</td>
                                    <td>Crear: Suministro --> ID:21</td>
                                    <td>Marcos Claros</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>16/11/2018 09:13</td>
                                    <td>Eliminar: Unidad de Medida ID:3</td>
                                    <td>Marcos Claros</td>
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

@endsection