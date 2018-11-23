@extends('layouts.dashboard-activos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-ruler fa-2x"></i>
                    </div>
                    <h3 class="card-title">Editar Categoria</h3>
                </div>
                <form method="POST" action="{{url('act/categorias-act/1')}}" autocomplete="off">
                    <div class="card-body ">
                        {{method_field('patch')}}
                        {{csrf_field()}}

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label for="nombre">Nombre</label>
                                    </div>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="Material de Oficina">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Categoria Superior</label>
                                    <select class="form-control selectpicker" data-live-search="true" data-style="btn btn-link" id="exampleFormControlSelect1">
                                        <option>Ninguna</option>
                                        <option>Material escritorio</option>
                                        <option>Material Limpieza</option>
                                        <option>Utensilios</option>
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