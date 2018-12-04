@extends('layouts.dashboard-suministros')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-arrow-right fa-2x"></i>
                    </div>
                    <h3 class="card-title">Ingreso de Suministros</h3>

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
                                        <a class="btn btn-fab btn-round btn-primary" href="{{url('sum/mov-suministros/ingresos/create')}}">
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
                                    <th><b>Fecha</b></th>
                                    <th><b>Estado</b></th>
                                    <th class="text-right"><b>Opciones</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ingresos as $ingreso)
                                    <tr>
                                        <td>{{$ingreso -> id}}</td>
                                        <td>{{$ingreso -> fecha_ingreso}}</td>
                                        <td>{{$ingreso -> estado}}</td>
                                        <td class="text-right ">
                                            <a href="{{url('sum/mov-suministros/ingresos/'.$ingreso -> id)}}">
                                                <button class="btn btn-outline-primary btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminarModelo('{{$ingreso -> id}}', '{{url('sum/mov-suministros/ingresos/'.$ingreso -> id)}}')">
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
                    {{$ingresos -> links('pagination.default')}}
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
                $('#modalEliminarTitulo').html("Anular Ingreso de suministro");
                $('#modalEliminarEnunciado').html("Realmente desea anular el ingreso Nro: " + nombre + "?");
                $('#modalEliminar').modal('show');

            }

        </script>

    @endpush()

@endsection