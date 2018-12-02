@extends('layouts.dashboard-seguridad')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-users fa-2x"></i>
                    </div>
                    <h3 class="card-title">Editar Usuario</h3>
                    @if($errors -> any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors -> all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <form method="POST" action="{{url('seg/usuarios/'.$usuario -> id)}}" autocomplete="off">
                    <div class="card-body ">
                        {{method_field('patch')}}
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label>Nombre Completo</label>
                                    </div>
                                    <input type="text" class="form-control" name="nombre" value="{{$usuario->nombre}}" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label>Cargo</label>
                                    </div>
                                    <input type="text" class="form-control"  name="cargo" value="{{$usuario->cargo}}" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Area de trabajo</label>
                                    <select class="form-control selectpicker" data-style="btn btn-link" name="area">
                                        @foreach($areas as $area)
                                            @if($area == $usuario -> area)
                                                <option selected value="{{$area}}">{{$area}}</option>
                                            @else
                                                <option value="{{$area}}">{{$area}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label>Email</label>
                                    </div>
                                    <input type="email" class="form-control"  name="email" value="{{$usuario->email}}" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label>Password</label>
                                    </div>
                                    <input type="password" class="form-control"  name="password">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer ">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->
@endsection