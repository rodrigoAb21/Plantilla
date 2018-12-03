@extends('layouts.dashboard-seguridad')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-user-clock fa-2x"></i>
                    </div>
                    <h3 class="card-title">Acciones del usuario: {{$usuario -> nombre}}</h3>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped ">
                            <thead>
                            <tr>
                                <th><b>#</b></th>
                                <th><b>Fecha</b></th>
                                <th><b>Descripcion</b></th>
                                <th><b>Lugar Afectado</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($acciones as $accion)
                                <tr>
                                    <td>{{$accion -> id}}</td>
                                    <td>{{Carbon\Carbon::parse($accion -> fecha)->format('d/m/Y h:i')}}</td>
                                    <td>{{$accion -> descripcion}}</td>
                                    <td>{{$accion -> tabla}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{$acciones -> links('pagination.default')}}
                </div>
            </div>

            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->

@endsection