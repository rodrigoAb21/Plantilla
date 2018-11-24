@extends('layouts.dashboard-activos')

@section('content')
    <form method="POST" action="{{url('act/mov-activos/ingresos')}}" autocomplete="off">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-angle-double-right fa-2x"></i>
                    </div>
                    <h3 class="card-title">Ingreso de Activos Fijos</h3>
                </div>

                <div class="card-body ">
                    {{csrf_field()}}

                        <div class="input-group">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label for="nombre">Nro. Factura</label>
                                    </div>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group mt-2 text-center">
                                    <div class="mb-1">
                                        <label for="nombre">Adjuntar imagen</label>
                                    </div>
                                    <span class="btn btn-primary btn-round btn-sm">
                                        <i class="fa fa-paperclip"></i>
                                        <input type="file" class="form-control" accept="image/*" >
                                    </span>
                                </div>
                            </div>
                        </div>



                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="activo">Activo</label>
                                        <select class="form-control selectpicker" data-live-search="true" data-style="btn btn-link" id="activo">
                                            <option>Activo 1</option>
                                            <option>Activo 2</option>
                                            <option>Activo 3</option>
                                            <option>Activo 4</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                    <div class="form-group mt-2">
                                        <div class="mb-1">
                                            <label for="nombre">Cantidad</label>
                                        </div>
                                        <input type="number" class="form-control" id="nombre" name="nombre" min="1">
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                    <div class="form-group mt-2">
                                        <div class="mb-1">
                                            <label for="costo">Costo Bs.</label>
                                        </div>
                                        <input type="number" class="form-control" id="costo" name="costo" min="1">
                                    </div>
                                </div>

                                <span class="input-group-btn pt-4 ml-auto mr-0">
                                    <button type="button" class="btn btn-fab btn-round btn-primary">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </span>
                            </div>
                        </div>

                </div>
            </div>
            <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-clipboard-list fa-2x"></i>
                    </div>
                    <h3 class="card-title">Detalle</h3>
                </div>

                    <div class="card-body ">
                        <div class="table-responsive table-bordered table-hover table-striped">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th scope="col" ><b>#</b></th>
                                    <th scope="col" class="w-75"><b>Activo</b></th>
                                    <th scope="col"><b>Cantidad</b></th>
                                    <th scope="col" class="text-right"><b>Opciones</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Activo 1</td>
                                        <td>15</td>
                                        <td class="text-right ">
                                            <button type="button" class="btn btn-outline-primary">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Activo 3</td>
                                        <td>10</td>
                                        <td class="text-right ">
                                            <button type="button" class="btn btn-outline-primary">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Activo 2</td>
                                        <td>25</td>
                                        <td class="text-right ">
                                            <button type="button" class="btn btn-outline-primary">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="card-footer ">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>

            </div>
            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    </form>
    <!-- end row -->
@endsection