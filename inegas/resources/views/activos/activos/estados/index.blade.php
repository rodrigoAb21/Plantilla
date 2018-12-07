@extends('layouts.dashboard-activos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-file-medical-alt fa-2x"></i>
                    </div>
                    <h3 class="card-title">Estados del activo: {{$activo -> codigo}}</h3>

                </div>
                <div class="card-body">

                    <form method="GET" action="{{url('/act/activos/'.$activo->id.'/estados')}}" autocomplete="off">
                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                <label for="busqueda" class="bmd-label-floating">Buscar</label>
                                <input type="text" class="form-control" id="busqueda" value="{{$busqueda}}" name="busqueda">
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn-fab btn-round btn-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <a class="btn btn-fab btn-round btn-primary" href="{{url('act/activos/'.$activo->id.'/estados/asignar')}}">
                                                <i class="fa fa-plus"></i>
                                        </a>
                                    </span>

                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover table-striped ">
                            <thead>
                            <tr>
                                <th><b>ID</b></th>
                                <th><b>Nombre</b></th>
                                <th><b>Fecha</b></th>
                                <th><b>Motivo</b></th>
                                <th class="text-right"><b>Opciones</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($estados as $estado)
                                <tr>
                                    <td>{{$estado -> id}}</td>
                                    <td>{{$estado -> nombre}}</td>
                                    <td>{{Carbon\Carbon::parse($estado -> fecha)->format('d/m/Y h:i A')}}</td>
                                    <td>{{$estado -> motivo}}</td>
                                    <td class="text-right ">
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="modalEliminar('{{$estado -> nombre}}', '{{url('act/activos/'.$estado->activo_fijo_id.'/estados/'.$estado -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{$estados->links('pagination.default')}}
                </div>
            </div>

            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->

    @include('modal')
    @push('scripts')
        <script>

            function modalEliminar(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#metodo').val("delete");
                $('#modalEliminarTitulo').html("Eliminar Estado");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar la estado: " + nombre + "?");
                $('#modalEliminar').modal('show');

            }

        </script>

    @endpush()

@endsection