@extends('layouts.dashboard-seguridad')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="text-right">Visitas: {{$visitas -> cant}}</p>
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-user-clock fa-2x"></i>
                    </div>
                    <h3 class="card-title">Bitacora</h3>

                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-hover table-striped ">
                            <thead>
                                <tr>
                                    <th><b>#</b></th>
                                    <th><b>Inicio</b></th>
                                    <th><b>Usuario</b></th>
                                    <th class="text-right"><b>Opciones</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bitacoras as $bitacora)
                                    <tr>
                                        <td>{{$bitacora -> id}}</td>
                                        <td>{{Carbon\Carbon::parse($bitacora -> inicio)->format('d/m/Y h:i A')}}</td>
                                        <td>{{$bitacora -> nombre}}</td>
                                        <td class="text-right">
                                            <a class="btn btn-outline-primary" href="{{url('seg/bitacora/'.$bitacora -> id)}}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{$bitacoras -> links('pagination.default')}}
                </div>
            </div>

            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->

@endsection