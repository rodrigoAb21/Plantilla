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
                    <h3 class="card-title">Nueva Ubicacion</h3>
                </div>
                <form method="POST" action="{{url('seg/ubicaciones')}}" autocomplete="off">
                <div class="card-body ">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="nombre" class="bmd-label-floating">Nombre</label>
                            <input type="text" required class="form-control" id="nombre" name="nombre">
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