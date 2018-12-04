@extends('layouts.dashboard-activos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-tags fa-2x"></i>
                    </div>
                    <h3 class="card-title">Nuevo Grupo</h3>
                </div>
                <form method="POST" action="{{url('act/grupos')}}" autocomplete="off">
                <div class="card-body ">
                    {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label for="nombre" >Nombre</label>
                                    </div>
                                    <input type="text" class="form-control" id="nombre" name="nombre">
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