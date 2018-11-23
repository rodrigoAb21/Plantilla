@extends('layouts.dashboard-activos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-couch fa-2x"></i>
                    </div>
                    <h3 class="card-title">Editar Activo Fijo</h3>
                </div>
                <form method="POST" action="{{url('act/activos')}}" autocomplete="off">
                <div class="card-body ">
                    {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label for="nombre" >Nombre</label>
                                    </div>
                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Categoria</label>
                                    <select class="form-control selectpicker" data-live-search="true" data-style="btn btn-link" id="exampleFormControlSelect1">
                                        <option>Categoria 1</option>
                                        <option>Categoria 2</option>
                                        <option>Categoria 3</option>
                                        <option>Categoria 4</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                </div>
                <div class="card-footer">
                    <div class="ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
                </form>
            </div>
            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->
@endsection