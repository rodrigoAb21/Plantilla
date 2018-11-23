@extends('layouts.dashboard-suministros')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-box-open fa-2x"></i>
                    </div>
                    <h3 class="card-title">Nuevo Suministro</h3>
                </div>
                <form method="POST" action="{{url('sum/suministros')}}" autocomplete="off">
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
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Unidad de Medida</label>
                                    <select class="form-control selectpicker" data-live-search="true" data-style="btn btn-link" id="exampleFormControlSelect1">
                                        <option>Caja</option>
                                        <option>Bolsa</option>
                                        <option>Paquete 10u</option>
                                        <option>Paquete 20u</option>
                                        <option>Paquete 500u</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Categoria</label>
                                    <select class="form-control selectpicker" data-live-search="true" data-style="btn btn-link" id="exampleFormControlSelect1">
                                        <option>Material de oficina</option>
                                        <option>Material Limpieza</option>
                                        <option>Utensilios</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label for="min" >Stock Min.</label>
                                    </div>
                                    <input type="number" class="form-control" id="min" name="min">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label for="max" >Stock Max.</label>
                                    </div>
                                    <input type="number" class="form-control" id="max" name="max">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="max" >Descripcion</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
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