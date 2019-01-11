@extends('layouts.dashboard-activos')

@section('content')
    <form method="POST" action="{{url('act/mov-activos/ingresos')}}" autocomplete="off" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card ">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-angle-double-right fa-2x"></i>
                        </div>
                        <h3 class="card-title">Ingreso de Activos</h3>
                    </div>

                    <div class="card-body ">
                        {{csrf_field()}}
                        <div class="input-group">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label>Fecha Ingreso</label>
                                    </div>
                                    <input type="date" class="form-control" name="fecha_ingreso" value="{{\Carbon\Carbon::now('America/La_Paz')->toDateString()}}" required >
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label>Fecha Factura</label>
                                    </div>
                                    <input type="date" class="form-control" name="fecha_factura" value="{{\Carbon\Carbon::now('America/La_Paz')->toDateString()}}" required >
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label>Proveedor</label>
                                    </div>
                                    <input type="text" class="form-control"  value="{{old('proveedor')}}" name="proveedor" required >
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label>Nro. Factura</label>
                                    </div>
                                    <input type="number" class="form-control" value="{{old('nro_factura')}}" name="nro_factura" required >
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group form-file-upload form-file-multiple mt-2">
                                    <div class="mb-1">
                                        <label>Adjuntar Factura</label>
                                    </div>
                                    <input type="file" name="foto_factura" accept="image/*" class="inputFileHidden" required>
                                    <div class="input-group">
                                        <input type="text" class="form-control inputFileVisible" name="foto_factura">
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

                    <div class="card-body">
                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Linea - Grupo</label>
                                        <select class="form-control selectpicker" data-live-search="true"
                                                data-style="btn btn-link" id="grupo_cab">
                                            @foreach($grupos as $grupo)
                                                <option value="{{$grupo->id}}_{{$grupo -> linea.' - '.$grupo -> grupo}}">{{$grupo -> linea.' - '.$grupo -> grupo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                    <div class="form-group mt-2">
                                        <div class="mb-1">
                                            <label>Cantidad</label>
                                        </div>
                                        <input type="number" class="form-control" id="cant_cab" min="1" value="1">
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                    <div class="form-group mt-2">
                                        <div class="mb-1">
                                            <label for="costo">Precio Uni. Bs</label>
                                        </div>
                                        <input type="number" step="any" class="form-control" id="pre_cab" min="0" value="1">
                                    </div>
                                </div>

                                <span class="input-group-btn pt-4 ml-auto mr-0">
                                    <button type="button" onclick="agregar()" class="btn btn-fab btn-round btn-primary">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </span>
                            </div>
                        </div>





                        <div class="table-responsive table-bordered">
                            <table class="table" id="tabla">
                                <tbody id="detalle">
                                </tbody>
                            </table>
                        </div>



                    </div>

                    <div class="card-footer ">
                        <div class="ml-auto mr-auto">
                            <button type="submit" id="guardar" class="btn btn-primary">Guardar</button>
                        </div>
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


        <script>
            var cont = 0;
            var grupos = [];
            $(document).ready(
                function () {
                    evaluar();
                    getGrupos();
                }
            );

            $('#grupo_cab').change(getGrupos);

            function getGrupos() {
                grupos = document.getElementById('grupo_cab').value.split('_');
            }

            function agregar() {
                var costo = parseFloat($('#pre_cab').val());
                var grupo_id = grupos[0];
                var grupo_nombre = grupos[1];
                var cant = parseInt($('#cant_cab').val());
                if (cant > 0 && costo > 0 && grupos[0] != ''){
                    var i;
                    for (i = 0; i < cant; i++) {
                        var fila = '' +
                            '<tr id="fila-'+cont+'">' +
                                '<td>' +
                                    '<div>' +
                                        '<div class="container-fluid">' +
                                            '<div class="row">' +
                                                '<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">' +
                                                    '<div class="fileinput fileinput-new text-center" data-provides="fileinput">' +
                                                        '<div class="fileinput-new thumbnail img-raised" style="height: 80%; width: 80%">' +
                                                            '<img src="{{asset('img/image_placeholder.jpg')}}"  alt="...">' +
                                                        '</div>' +
                                                        '<div class="fileinput-preview fileinput-exists thumbnail img-raised">' +
                                                        '</div>' +
                                                        '<div class="btn btn-raised btn-round btn-sm btn-default btn-file">' +
                                                            '<span class="fileinput-new">Select image</span>' +
                                                            '<span class="fileinput-exists">Change</span>' +
                                                            '<input type="file" name="fotoT[]" required/>' +
                                                        '</div>' +
                                                    '</div>' +
                                                '</div>' +
                                                '<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">' +
                                                    '<div class="row">' +
                                                        '<div class="col-lg-10 col-md-10 col-sm-6 col-xs-12">' +
                                                            '<div class="form-group">' +
                                                                '<label>Linea - Grupo</label>' +
                                                                '<input class="form-control" value="'+grupo_nombre+'" disabled>' +
                                                                '<input type="hidden" name="grupo_a_idT[]" value="'+grupo_id+'">' +
                                                            '</div>' +
                                                        '</div>' +
                                                        '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">' +
                                                            '<div class="form-group">' +
                                                                '<label>Costo</label>' +
                                                                '<input type="number" class="form-control" name="costoT[]" value="'+costo+'" readonly>' +
                                                            '</div>' +
                                                        '</div>' +
                                                        '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">' +
                                                            '<div class="form-group">' +
                                                                '<label>Marca</label>' +
                                                                '<input type="text" class="form-control" name="marcaT[]" required>' +
                                                            '</div>' +
                                                        '</div>' +
                                                        '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">' +
                                                            '<div class="form-group">' +
                                                                '<label>Nro Serie</label>' +
                                                                '<input type="text" class="form-control" name="serieT[]" required>' +
                                                            '</div>' +
                                                        '</div>' +
                                                        '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">' +
                                                            '<div class="form-group">' +
                                                                '<label>Modelo</label>' +
                                                                '<input type="text" class="form-control" name="modeloT[]" required>' +
                                                            '</div>' +
                                                        '</div>' +
                                                        '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">' +
                                                            '<div class="form-group">' +
                                                                '<label>Color</label>' +
                                                                '<input type="text" class="form-control" name="colorT[]" required>' +
                                                            '</div>' +
                                                        '</div>' +
                                                        '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">' +
                                                            '<div class="form-group">' +
                                                                '<label>Caracteristicas</label>' +
                                                                '<textarea class="form-control" name="caracteristicasT[]" rows="3" required></textarea>' +
                                                            '</div>' +
                                                        '</div>' +
                                                    '</div>' +
                                                '</div>' +
                                                '<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">' +
                                                    '<button type="button" onclick="eliminar('+cont+')" class="btn btn-outline-primary btn-sm btn-round btn-fab">' +
                                                        '<i class="fa fa-times"></i>' +
                                                    '</button>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</td>' +
                            '</tr>';

                        cont++;
                        limpiar();
                        $('#detalle').append(fila);
                    }
                }
                evaluar();
            }

            function limpiar(){
                $('#cant_cab').val("1");
                $('#pre_cab').val("1");
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