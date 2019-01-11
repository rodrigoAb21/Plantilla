@extends('layouts.dashboard-suministros')

@section('content')
    <form method="POST" action="{{url('sum/mov-suministros/salidas')}}" autocomplete="off" enctype="multipart/form-data">
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
                        <i class="fa fa-arrow-left fa-2x"></i>
                    </div>
                    <h3 class="card-title">Salida de Suministros</h3>
                </div>

                <div class="card-body ">
                    {{csrf_field()}}
                    <div class="input-group">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group mt-2">
                                <div class="mb-1">
                                    <label>Fecha</label>
                                </div>
                                <input type="date" class="form-control" name="fecha" value="{{\Carbon\Carbon::now('America/La_Paz')->toDateString()}}" required>
                            </div>
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                            <div class="form-group mt-2">
                                <div class="mb-1">
                                    <label>Recibe</label>
                                </div>
                                <select class="form-control selectpicker" data-live-search="true"
                                        data-style="btn btn-link" name="trabajador_id" required>
                                    @foreach($trabajadores as $trabajador)
                                        <option value="{{$trabajador->id}}">{{$trabajador -> nombre}} // {{$trabajador -> cargo}} // {{$trabajador -> ubicacion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group mt-2">
                                <div class="mb-1">
                                    <label>Observacion</label>
                                </div>
                                <textarea class="form-control" name="observacion" required>{{old('observacion')}}</textarea>
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
                                                <option value="{{json_encode($suministro)}}">{{$suministro -> nombre.'- Stock: '.$suministro -> stock}}</option>
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
                                    <th scope="col" class="w-75"><b>Suministro</b></th>
                                    <th scope="col"><b>Cantidad</b></th>
                                    <th scope="col" class="text-right"><b>Opciones</b></th>
                                </tr>
                                </thead>
                                <tbody id="detalle">
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="card-footer ">
                        <button id="guardar" class="btn btn-primary" type="submit"Recibe>Guardar</button>
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
            var agregados = [];

            function agregar() {
                var suministro = JSON.parse($('#sumi_cab').val());
                sum_id = suministro.id;
                sum_nombre = suministro.nombre;
                cant = $('#cant_cab').val();

                if (!agregados.includes(String(sum_id)) && sum_id != "" && cant != "" && cant > 0 && suministro.stock >= cant) {
                    agregados.push(String(sum_id));
                    console.log(agregados);
                    var fila = '' +
                        '<tr id="fila-'+cont+'">' +
                            '<td><input required type="hidden" name="sumiT[]" value="'+sum_id+'">'+sum_nombre+'</td>' +
                            '<td><input required class="form-control" type="hidden" name="cantT[]" value="'+cant+'">'+cant+'</td>' +
                            '<td class="text-right">' +
                                '<button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminar('+cont+','+sum_id+')">' +
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
            }

            function eliminar(index, id){
                var i = agregados.indexOf(String(id));
                if (i > -1) {
                    agregados.splice(i, 1);
                }
                console.log(agregados);
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