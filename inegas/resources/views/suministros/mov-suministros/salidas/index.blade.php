@extends('layouts.dashboard-suministros')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-arrow-left fa-2x"></i>
                    </div>
                    <h3 class="card-title">Salida de Suministros</h3>

                </div>
                <div class="card-body">
                    <form method="GET" action="{{url('sum/mov-suministros/salidas')}}" autocomplete="off">
                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                <label for="busqueda" class="bmd-label-floating">Buscar</label>
                                <input type="text" class="form-control" id="busqueda" name="busqueda" value="{{$busqueda}}" >
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn-fab btn-round btn-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <a href="{{url('sum/reportes/movimientos/salidasPDF')}}">
                                            <button type="button" class="btn btn-fab btn-round btn-primary" title="Descargar PDF" >
                                                <i class="fa fa-file-pdf"></i>
                                            </button>
                                        </a>
                                        <a class="btn btn-fab btn-round btn-primary" href="{{url('sum/mov-suministros/salidas/create')}}">
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
                                    <th><b>N. Documento</b></th>
                                    <th><b>Fecha</b></th>
                                    <th><b>Area</b></th>
                                    <th><b>Ubicacion</b></th>
                                    <th><b>Recibe</b></th>
                                    <th><b>Estado</b></th>
                                    <th class="text-right"><b>Opciones</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($salidas as $salida)
                                    <tr>
                                        <td>{{$salida -> id}}</td>
                                        <td>{{Carbon\Carbon::parse($salida -> fecha)->format('d/m/Y h:i A')}}</td>
                                        <td>{{$salida -> area}}</td>
                                        <td>{{$salida -> ubicacion}}</td>
                                        <td>{{$salida -> recibe}}</td>
                                        <td>{{$salida -> estado}}</td>
                                        <td class="text-right ">
                                            <a href="{{url('sum/mov-suministros/salidas/'.$salida -> id)}}">
                                                <button class="btn btn-outline-primary btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            @if($salida -> estado != 'Anulado')
                                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminarModelo('{{$salida -> id}}', '{{url('sum/mov-suministros/salidas/'.$salida -> id)}}')">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-outline-primary btn-sm" disabled>
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
                    {{$salidas -> links('pagination.default')}}
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

            function eliminarModelo(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#modalEliminarTitulo').html("Anular Salida de suministro");
                $('#modalEliminarEnunciado').html("Realmente desea anular la salida Nro: " + nombre + "?");
                $('#modalEliminar').modal('show');

            }

        </script>

    @endpush()

@endsection