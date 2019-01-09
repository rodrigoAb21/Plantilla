@extends('layouts.dashboard-suministros')

@section('content')
    <form method="POST" action="{{url('sum/mov-suministros/ingresos')}}" autocomplete="off" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-arrow-right fa-2x"></i>
                    </div>
                    <h3 class="card-title">Ingreso de Suministros</h3>
                </div>

                <div class="card-body ">
                    {{csrf_field()}}
                    <div class="input-group">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group mt-2">
                                <div class="mb-1">
                                    <label>Fecha Ingreso</label>
                                </div>
                                <input type="date" class="form-control" name="fecha_ingreso"  required value="{{\Carbon\Carbon::now('America/La_Paz')->toDateString()}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group mt-2">
                                <div class="mb-1">
                                    <label>Fecha Factura</label>
                                </div>
                                <input type="date" class="form-control" name="fecha_factura"  required value="{{\Carbon\Carbon::now('America/La_Paz')->toDateString()}}">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                            <div class="form-group mt-2">
                                <div class="mb-1">
                                    <label>Proveedor</label>
                                </div>
                                <input type="text" class="form-control" name="proveedor" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="form-group mt-2">
                                <div class="mb-1">
                                    <label>Nro. Factura</label>
                                </div>
                                <input type="number" class="form-control" name="nro_factura" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group form-file-upload form-file-multiple mt-2">
                                <div class="mb-1">
                                    <label>Adjuntar Factura</label>
                                </div>
                                <input type="file" name="foto_factura" accept="image/*" class="inputFileHidden" required>
                                <div class="input-group">
                                    <input type="text" class="form-control inputFileVisible" name="foto_factura"  required>
                                    <span class="input-group-btn">
                                            <button type="button" class="btn btn-fab btn-round btn-primary">
                                                <i class="material-icons">attach_file</i>
                                            </button>
                                        </span>
                                </div>
                            </div>
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
                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Suministro</label>
                                        <select class="form-control selectpicker" data-live-search="true"
                                                data-style="btn btn-link" id="sumi_cab">
                                            @foreach($suministros as $suministro)
                                                <option value="{{$suministro->id}}">{{$suministro -> nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                    <div class="form-group mt-2">
                                        <div class="mb-1">
                                            <label>Cantidad</label>
                                        </div>
                                        <input type="number" class="form-control" id="cant_cab" min="1">
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                    <div class="form-group mt-2">
                                        <div class="mb-1">
                                            <label for="costo">Precio Uni. Bs</label>
                                        </div>
                                        <input type="number" step="any" class="form-control" id="pre_cab" min="0">
                                    </div>
                                </div>

                                <span class="input-group-btn pt-4 ml-auto mr-0">
                                    <button type="button" onclick="agregar()" class="btn btn-fab btn-round btn-primary">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </span>
                            </div>
                        </div>

                        <div class="table-responsive table-bordered table-hover table-striped">
                            <table class="table" id="tabla">
                                <thead>
                                <tr>
                                    <th scope="col" class="w-50"><b>Suministro</b></th>
                                    <th scope="col"><b>Cantidad</b></th>
                                    <th scope="col"><b>Precio Uni.</b></th>
                                    <th scope="col" class="text-right"><b>Opciones</b></th>
                                </tr>
                                </thead>
                                <tbody id="detalle">
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="card-footer ">
                        <button id="guardar" type="submit" class="btn btn-primary">Guardar</button>
                    </div>

            </div>
            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    </form>
    <!-- end row -->
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









        <script>
            $(document).ready(
                function () {
                    evaluar();
                }
            );

            var cont = 0;

            function agregar() {
                sum_id = $('#sumi_cab').val();
                sum_nombre = $('#sumi_cab option:selected').text();
                cant = $('#cant_cab').val();
                prec = $('#pre_cab').val();

                if (sum_id != "" && cant != "" && cant > 0 && prec != "" && prec > 0) {
                    var fila = '' +
                        '<tr id="fila-'+cont+'">' +
                            '<td><input required type="hidden" name="sumiT[]" value="'+sum_id+'">'+sum_nombre+'</td>' +
                            '<td><input required class="form-control" type="hidden" name="cantT[]" value="'+cant+'">'+cant+'</td>' +
                            '<td><input required type="hidden" name="precioT[]" value="'+prec+'">'+prec+'</td>' +
                            '<td class="text-right">' +
                                '<button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminar('+cont+')">' +
                                    '<i class="fa fa-times"></i>' +
                                '</button>' +
                            '</td>' +
                        '</tr>';
                    cont++;
                    limpiar();
                    $('#detalle').append(fila); // sirve para anhadir una fila a los detalles
                }
                evaluar();
            }

            function limpiar(){
                $('#cant_cab').val("");
                $('#pre_cab').val("");
            }

            function eliminar(index){
                cont--;
                $("#fila-" + index).remove();
                evaluar();
            }

            function evaluar(){
                if (cont > 0) {
                    $("#guardar").show();
                }else{
                    $("#guardar").hide();
                }
            }

        </script>
    @endpush

@endsection