@extends('layouts.dashboard-suministros')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-box-open fa-2x"></i>
                    </div>
                    <h3 class="card-title">Suministros</h3>

                </div>
                <div class="card-body">

                    <form method="GET" action="{{url('sum/suministros')}}" autocomplete="off">
                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                <label for="busqueda" class="bmd-label-floating">Buscar</label>
                                <input type="text" class="form-control" id="busqueda" name="busqueda" value="{{$busqueda}}" >
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn-fab btn-round btn-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <a class="btn btn-fab btn-round btn-primary" href="{{url('sum/suministros/create')}}">
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
                                    <th><b>Marca</b></th>
                                    <th><b>U. Medida</b></th>
                                    <th><b>Grupo</b></th>
                                    <th class="text-right"><b>Opciones</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($suministros as $suministro)
                                    <tr>
                                        <td>{{$suministro -> id}}</td>
                                        <td>{{$suministro -> nombre}}</td>
                                        <td>{{$suministro -> marca}}</td>
                                        <td>{{$suministro -> medida}}</td>
                                        <td>{{$suministro -> grupo}}</td>
                                        <td class="text-right ">
                                            <button class="btn btn-outline-primary btn-sm" onclick="verSuministro()">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <a href="{{url('sum/suministros/1/edit')}}">
                                                <button class="btn btn-outline-primary btn-sm">
                                                    <i class="fa fa-pen"></i>
                                                </button>
                                            </a>
                                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminarSuministro('Papel Bond Carta', '{{url('sum/suministros/1')}}')">
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
                    {{$suministros -> links('pagination.default')}}
                </div>
            </div>

            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->

    @include('modal')
    @include('suministros.suministros.show')
    @push('scripts')
        <script>

            function eliminarSuministro(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#modalEliminarTitulo').html("Eliminar Suministro");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar el suministro: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }

            function verSuministro() {
                $('#modalVer').modal('show');
            }

        </script>

    @endpush()

@endsection