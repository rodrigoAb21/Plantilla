@extends('layouts.dashboard-seguridad')

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
                        <i class="fa fa-sitemap fa-2x"></i>
                    </div>
                    <h3 class="card-title">Editar Ubicacion</h3>
                </div>
                <form method="POST" action="{{url('seg/ubicaciones/'.$ubicacion -> id)}}" autocomplete="off">
                    <div class="card-body ">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="form-group">
                            <label for="nombre" class="bmd-label-floating">Nombre</label>
                            <input type="text" required class="form-control" id="nombre" name="nombre" value="{{$ubicacion -> nombre}}">
                        </div>
                    </div>
                    <div class="card-footer ">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
            <!--  end card  -->



            <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-users fa-2x"></i>
                    </div>
                    <h3 class="card-title">Trabajadores</h3>
                </div>

                <div class="card-body ">
                    <form method="GET" action="{{url('seg/ubicaciones/'.$ubicacion -> id.'/edit')}}" autocomplete="off">
                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                <label for="busqueda" class="bmd-label-floating">Buscar</label>
                                <input type="text" class="form-control" id="busqueda" name="busqueda"  value="{{$busqueda}}" >
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn-fab btn-round btn-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <button type="button" class="btn btn-fab btn-round btn-primary" onclick="modalCreate('{{url('seg/ubicaciones/'.$ubicacion -> id.'/trabajadores')}}')">
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
                                <th scope="col"><b>Nombre</b></th>
                                <th scope="col"><b>Cargo</b></th>
                                <th scope="col" class="text-right w-25"><b>Opciones</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trabajadores as $trabajador)
                                <tr>
                                    <td>{{$trabajador -> id}}</td>
                                    <td>{{$trabajador -> nombre}}</td>
                                    <td>{{$trabajador -> cargo}}</td>
                                    <td class="text-right ">
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="modalEdit('{{$trabajador -> nombre}}','{{$trabajador -> cargo}}','{{url('seg/ubicaciones/'.$ubicacion -> id.'/trabajadores/'.$trabajador -> id)}}' )">
                                            <i class="fa fa-pen"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="modalEliminar('{{$trabajador -> nombre}}','{{url('seg/ubicaciones/'.$ubicacion -> id.'/trabajadores/'.$trabajador -> id)}}')">
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


    @include('seguridad.ubicaciones.modal')
    @include('modal')
    @push('scripts')
        <script>

            function modalCreate(url) {
                $('#modalForm').attr("action", url);
                $('#modalTitulo').html("Nuevo Trabajador");
                $('#nombreT').val('');
                $('#cargoT').val('');
                $('#metodo').val('');
                $('#modalTrab').modal('show');
            }

            function modalEdit(nombre, cargo, url) {
                $('#modalForm').attr("action", url);
                $('#metodo').val('patch');
                $('#nombreT').val(nombre);
                $('#cargoT').val(cargo);
                $('#modalTitulo').html("Editar Trabajador");
                $('#modalTrab').modal('show');
            }

            function modalEliminar(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#modalEliminarTitulo').html("Eliminar Grupo");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar el trabajador: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }
        </script>

    @endpush()
@endsection