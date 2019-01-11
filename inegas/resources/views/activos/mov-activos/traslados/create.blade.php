@extends('layouts.dashboard-activos')

@section('content')
    <form method="POST" action="{{url('act/mov-activos/traslados')}}" autocomplete="off">
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
                        <i class="fa fa-dolly-flatbed fa-2x"></i>
                    </div>
                    <h3 class="card-title">Traslados</h3>
                </div>

                <div class="card-body ">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group mt-2">
                                <div class="mb-1">
                                    <label>Fecha</label>
                                </div>
                                <input type="date" class="form-control" name="fecha" value="{{\Carbon\Carbon::now('America/La_Paz')->toDateString()}}" required >
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Ubicaciones</label>
                                <select class="form-control selectpicker" data-live-search="true"
                                        data-style="btn btn-link" name="ubicacion_id" required >
                                    @foreach($ubicaciones as $ubicacion)
                                        <option value="{{$ubicacion -> id}}">{{$ubicacion -> nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                            <div class="form-group mt-2">
                                <div class="mb-1">
                                    <label>Observacion</label>
                                </div>
                                <textarea name="observacion" class="form-control" rows="3" required >{{old('observacion')}}</textarea>
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
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Activo Fijo (Codigo, Linea - Grupo)</label>
                                        <select class="form-control selectpicker" data-live-search="true"
                                                data-style="btn btn-link" id="activo_cab">
                                            @foreach($activos as $activo)
                                                <option value="{{$activo->id}}">{{'COD:'.$activo -> codigo.', '.$activo -> linea.' - '.$activo -> grupo}}</option>
                                            @endforeach
                                        </select>
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
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th scope="col" class="w-75"><b>Activo</b></th>
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
    @push('scripts')
    <!-- end row -->
    <script>
        var cont = 0;
        var activo_id = 0;
        var activo_nombre = '';
        var agregados = [];

        $(document).ready(
            function () {
                evaluar();
                getActivo();
            }
        );

        $('#activo_cab').change(getActivo);

        function getActivo() {
            activo_id = $('#activo_cab').val();
            activo_nombre = $('#activo_cab option:selected').text();
        }

        function agregar() {
            if (!agregados.includes(activo_id) && activo_nombre != ''){
                agregados.push(activo_id);

                var fila = ''+
                            '<tr id="fila-'+cont+'">' +
                                '<td>' +
                                    '<input type="hidden" value="'+activo_id+'" name="activo_fijo_idT[]"  required >'+
                                        activo_nombre+
                                '</td>' +
                                '<td class="text-right">' +
                                    '<button onclick="eliminar('+cont+','+activo_id+')" class="btn btn-sm btn-outline-primary">' +
                                        '<i class="fa fa-times"></i>' +
                                    '</button>' +
                                '</td>' +
                            '</tr>';
                cont++;
                $('#detalle').append(fila);
                evaluar();

            }
        }

        function eliminar(index, id){
            var i = agregados.indexOf(String(id));
            if (i > -1) {
                agregados.splice(i, 1);
            }
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