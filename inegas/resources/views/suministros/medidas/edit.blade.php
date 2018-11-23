@extends('layouts.dashboard-suministros')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-ruler fa-2x"></i>
                    </div>
                    <h3 class="card-title">Editar Unidad de medida</h3>
                </div>
                <form method="POST" action="{{url('sum/medidas/1')}}" autocomplete="off">
                    <div class="card-body ">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="form-group">
                            <label for="nombre" class="bmd-label-floating">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="Caja">
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