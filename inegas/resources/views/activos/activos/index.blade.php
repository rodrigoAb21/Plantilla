@extends('layouts.dashboard-activos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-couch fa-2x"></i>
                    </div>
                    <h3 class="card-title">Activos Fijos</h3>

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
                                    </span>

                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover table-striped ">
                            <thead>
                                <tr>
                                    <th><b>Codigo</b></th>
                                    <th><b>Serie</b></th>
                                    <th><b>Linea - Grupo</b></th>
                                    <th class="text-right"><b>Opciones</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($activos as $activo)
                                    <tr>
                                        <td>{{$activo -> codigo}}</td>
                                        <td>{{$activo -> serie}}</td>
                                        <td>{{$activo -> linea.' - '.$activo -> grupo}}</td>
                                        <td class="text-right ">
                                            <a href="{{url('act/activos/'.$activo -> id)}}">
                                                <button class="btn btn-outline-primary btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            @if($activo -> disponibilidad != 'Baja')
                                                <a href="{{url('act/activos/'.$activo->id.'/edit')}}">
                                                    <button class="btn btn-outline-primary btn-sm">
                                                        <i class="fa fa-pen"></i>
                                                    </button>
                                                </a>
                                                <a href="{{url('act/activos/'.$activo->id.'/estados')}}">
                                                    <button class="btn btn-outline-primary btn-sm">
                                                        <i class="fa fa-file-medical-alt"></i>
                                                    </button>
                                                </a>
                                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="modal_baja('{{$activo -> codigo}}', '{{url('act/activos/'.$activo->id)}}', '{{$hoy}}')">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{$activos -> links('pagination.default')}}
                </div>
            </div>

            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->

    @include('activos.activos.modal_baja')
    @include('suministros.suministros.show')
    @push('scripts')
        <script>

            function modal_baja(codigo, url, fecha) {
                $('#modalForm').attr("action", url);
                $('#fecha').val(fecha);
                $('#motivo').val("");
                $('#modalTitulo').html('Baja del Activo: ' + codigo);
                $('#modal_baja').modal('show');
            }
        </script>

    @endpush()

@endsection