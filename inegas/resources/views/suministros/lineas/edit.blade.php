@extends('layouts.dashboard-suministros')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-tags fa-2x"></i>
                    </div>
                    <h3 class="card-title">Editar Linea</h3>
                </div>
                <form method="POST" action="{{url('sum/lineas/'.$linea -> id)}}" autocomplete="off">
                    <div class="card-body ">
                        {{method_field('patch')}}
                        {{csrf_field()}}

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label for="nombre">Nombre</label>
                                    </div>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$linea -> nombre}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="mr-0 ml-auto">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
            <!--  end card  -->

            <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-object-group fa-2x"></i>
                    </div>
                    <h3 class="card-title">Grupos</h3>
                </div>

                <div class="card-body ">
                    <form method="GET" action="{{url('sum/lineas/'.$linea -> id.'/edit')}}" autocomplete="off">
                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                <label for="busqueda" class="bmd-label-floating">Buscar</label>
                                <input type="text" class="form-control" id="busqueda" name="busqueda"  value="{{$busqueda}}" >
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn-fab btn-round btn-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <button type="button" class="btn btn-fab btn-round btn-primary" onclick="modalCreate('{{url('sum/lineas/'.$linea -> id.'/grupo')}}')">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </span>

                            </div>
                        </div>
                    </form>
                    <div class="table-responsive table-bordered table-hover table-striped">
                        <table class="table ">
                            <thead>
                            <tr>
                                <th scope="col" ><b>#</b></th>
                                <th scope="col" class="w-75"><b>Nombre</b></th>
                                <th scope="col" class="text-right"><b>Opciones</b></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($grupos as $grupo)
                                    <tr>
                                        <td>{{$grupo -> id}}</td>
                                        <td>{{$grupo -> nombre}}</td>
                                        <td class="text-right ">
                                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="modalEdit('{{$grupo -> nombre}}','{{url('sum/lineas/'.$linea -> id.'/grupo/'.$grupo -> id)}}' )">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminarGrupo('{{$grupo -> nombre}}','{{url('sum/lineas/'.$linea -> id.'/grupo/'.$grupo -> id)}}')">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->
    @include('suministros.lineas.grupos.modal')
    @include('modal')
    @push('scripts')
        <script>

            function modalCreate(url) {
                $('#modalForm').attr("action", url);
                $('#modalTitulo').html("Nuevo Grupo");
                $('#nombreGrupo').val('');
                $('#metodo').val('');
                $('#modalGrupo').modal('show');
            }


            function modalEdit(nombre, url) {
                $('#modalForm').attr("action", url);
                $('#metodo').val('patch');
                $('#nombreGrupo').val(nombre);
                $('#modalTitulo').html("Editar Grupo");
                $('#modalGrupo').modal('show');
            }

            function eliminarGrupo(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#modalEliminarTitulo').html("Eliminar Grupo");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar el grupo: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }
        </script>

    @endpush()
@endsection