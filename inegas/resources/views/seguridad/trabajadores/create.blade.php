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
                        <i class="fa fa-user-tie fa-2x"></i>
                    </div>
                    <h3 class="card-title">Nuevo Trabajador</h3>
                </div>
                <form method="POST" action="{{url('seg/trabajadores')}}" autocomplete="off">
                <div class="card-body ">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" required class="form-control"  value="{{old('nombre')}}" name="nombre">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Cargo</label>
                                <input type="text" required class="form-control"  value="{{old('cargo')}}" name="cargo">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Area de trabajo</label>
                                <select class="form-control selectpicker" data-style="btn btn-link" name="area_id" required>
                                    @foreach($areas as $area)
                                        <option value="{{$area -> id}}">{{$area -> nombre}}</option>
                                    @endforeach
                                </select>
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