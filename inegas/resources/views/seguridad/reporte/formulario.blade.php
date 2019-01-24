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
                        <i class="fa fa-wrench fa-2x"></i>
                    </div>
                    <h3 class="card-title">Configuracion PDF</h3>
                </div>
                <form method="POST" action="{{url('seg/configuracion')}}" autocomplete="off">
                    <div class="card-body ">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label>Codigo</label>
                                    </div>
                                    <input type="text" class="form-control" value="{{$reporte->codigo}}"  name="codigo" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label>Fecha</label>
                                    </div>
                                    <input type="date" class="form-control" value="{{$reporte->fecha}}"    name="fecha" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label>Revision</label>
                                    </div>
                                    <input type="text" class="form-control" value="{{$reporte->revision}}"    name="revision" required>
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