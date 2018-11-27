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
                                    <input type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group form-file-upload form-file-multiple mt-2">
                                    <div class="mb-1">
                                        <label>Adjuntar Imagen</label>
                                    </div>
                                    <input type="file" name="imagen" accept="image/*" class="inputFileHidden">
                                    <div class="input-group">
                                        <input type="text" class="form-control inputFileVisible">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-fab btn-round btn-primary">
                                                <i class="material-icons">attach_file</i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="activo">Activo</label>
                                        <select class="form-control selectpicker" data-live-search="true"
                                                data-style="btn btn-link" id="activo">
                                            <option>Activo 1</option>
                                            <option>Activo 2</option>
                                            <option>Activo 3</option>
                                            <option>Activo 4</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                    <div class="form-group mt-2">
                                        <div class="mb-1">
                                            <label for="nombre">Cantidad</label>
                                        </div>
                                        <input type="number" class="form-control" id="nombre" name="nombre" min="1">
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
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
                        <div>
                            <div class="card-body" style="width: 20rem;">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 float-left">
                                    <img src="{{asset('img/product1.jpg')}}" height="100px">
                                </div>
                                <div class="float-right">
                                    <h4 class="card-title">Artículo</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">Costo</h6>
                                    <p>Descripción...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div>
                            <div class="card-body" style="width: 20rem;">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 float-left">
                                    <img src="{{asset('img/product1.jpg')}}" height="100px">
                                </div>
                                <div class="float-right">
                                    <h4 class="card-title">Artículo</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">Costo</h6>
                                    <p>Descripción...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<div class="table-responsive table-bordered table-hover table-striped">--}}
                    {{--<table class="table ">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                    {{--<th scope="col" ><b>#</b></th>--}}
                    {{--<th scope="col" class="w-75"><b>Activo</b></th>--}}
                    {{--<th scope="col"><b>Cantidad</b></th>--}}
                    {{--<th scope="col" class="text-right"><b>Opciones</b></th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
                    {{--<tr>--}}
                    {{--<td>1</td>--}}
                    {{--<td>Activo 1</td>--}}
                    {{--<td>15</td>--}}
                    {{--<td class="text-right ">--}}
                    {{--<button type="button" class="btn btn-outline-primary">--}}
                    {{--<i class="fa fa-times"></i>--}}
                    {{--</button>--}}
                    {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                    {{--<td>2</td>--}}
                    {{--<td>Activo 3</td>--}}
                    {{--<td>10</td>--}}
                    {{--<td class="text-right ">--}}
                    {{--<button type="button" class="btn btn-outline-primary">--}}
                    {{--<i class="fa fa-times"></i>--}}
                    {{--</button>--}}
                    {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                    {{--<td>3</td>--}}
                    {{--<td>Activo 2</td>--}}
                    {{--<td>25</td>--}}
                    {{--<td class="text-right ">--}}
                    {{--<button type="button" class="btn btn-outline-primary">--}}
                    {{--<i class="fa fa-times"></i>--}}
                    {{--</button>--}}
                    {{--</td>--}}
                    {{--</tr>--}}
                    {{--</tbody>--}}
                    {{--</table>--}}
                    {{--</div>--}}


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
    @push('scripts')
        <script>
            $('.form-file-simple .inputFileVisible').click(function () {
                $(this).siblings('.inputFileHidden').trigger('click');
            });

            $('.form-file-simple .inputFileHidden').change(function () {
                var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
                $(this).siblings('.inputFileVisible').val(filename);
            });

            $('.form-file-multiple .inputFileVisible, .form-file-multiple .input-group-btn').click(function () {
                $(this).parent().parent().find('.inputFileHidden').trigger('click');
                $(this).parent().parent().addClass('is-focused');
            });

            $('.form-file-multiple .inputFileHidden').change(function () {
                var names = '';
                for (var i = 0; i < $(this).get(0).files.length; ++i) {
                    if (i < $(this).get(0).files.length - 1) {
                        names += $(this).get(0).files.item(i).name + ',';
                    } else {
                        names += $(this).get(0).files.item(i).name;
                    }
                }
                $(this).siblings('.input-group').find('.inputFileVisible').val(names);
            });

            $('.form-file-multiple .btn').on('focus', function () {
                $(this).parent().siblings().trigger('focus');
            });

            $('.form-file-multiple .btn').on('focusout', function () {
                $(this).parent().siblings().trigger('focusout');
            });
        </script>
    @endpush
@endsection