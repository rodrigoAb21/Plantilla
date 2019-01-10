@extends('layouts.dashboard-activos')

@section('content')
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
                        <i class="fa fa-file-invoice-dollar fa-2x"></i>
                    </div>
                    <h3 class="card-title">Nuevo Revaluo</h3>
                </div>
                <form method="POST" action="{{url('act/revaluos')}}" autocomplete="off">
                <div class="card-body ">
                    {{csrf_field()}}
                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="activo">Codigo / Grupo</label>
                                    <select id="selector" class="form-control selectpicker" data-live-search="true" data-style="btn btn-link" name="activo_fijo_id" required >
                                        @foreach($activos as $activo)
                                            <option value="{{$activo -> id}}">{{$activo -> codigo.' / '.$activo -> grupo.' - '.$activo -> serie}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label>Costo Actual Bs</label>
                                    </div>
                                    <p class="form-control" id="costo_actual"></p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label>Monto Bs</label>
                                    </div>
                                    <input required id="monto" type="number" onblur="calcular_costo_final()" step="any" class="form-control" name="monto" value="0">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label>Costo Final Bs</label>
                                    </div>
                                    <input required type="number" onblur="calcular_monto()" id="costo_final" step="any" class="form-control">
                                </div>
                            </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group mt-2">
                                        <div class="mb-1">
                                            <label>Motivo</label>
                                        </div>
                                        <textarea rows="3" class="form-control" name="motivo" required></textarea>
                                    </div>
                                </div>
                            </div>

                </div>
                <div class="card-footer">
                    <div class="ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
                </form>
            </div>
            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->
    @push('scripts')
        <script>
            var activos = [];
            var costo_actual = 0;
            var costo_final = 0;
            var monto = 0;
            $(document).ready(
                function () {
                    @foreach($activos as $activo)
                    activos.push({id:parseInt('{{$activo -> id}}'), costo_actual:parseFloat('{{$activo -> costo_actual}}')})
                    @endforeach

                    seleccionado();
                }
            );

            $('#selector').change(seleccionado);


            function seleccionado() {
                var selected = $('#selector').val();
                activos.forEach(function (activo) {
                    if (activo.id == selected){
                        costo_actual = activo.costo_actual;
                        $('#costo_actual').html(costo_actual);
                    }
                })
                calcular_costo_final();
            }

            function calcular_monto() {
                costo_final = parseFloat($('#costo_final').val());
                monto = costo_final - costo_actual;
                $('#monto').val(monto);
            }

            function calcular_costo_final() {
                monto = parseFloat($('#monto').val());
                costo_final = costo_actual + monto;
                $('#costo_final').val(costo_final);
            }





        </script>
    @endpush


@endsection