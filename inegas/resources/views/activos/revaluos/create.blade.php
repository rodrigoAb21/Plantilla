@extends('layouts.dashboard-activos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-file-invoice-dollar fa-2x"></i>
                    </div>
                    <h3 class="card-title">Nuevo Revaluo</h3>
                </div>
                <form method="POST" action="{{url('act/revaluos')}}" autocomplete="off">
                <div class="card-body ">
                    {{csrf_field()}}
                        <div class="row">

                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="activo">Activo Fijo</label>
                                        <select class="form-control selectpicker" data-live-search="true" data-style="btn btn-link" id="activo">
                                            <option>Activo 1 - 1 - Categoria 1</option>
                                            <option>Activo 2 - 2 - Categoria 1</option>
                                            <option>Activo 3 - 3 - Categoria 1</option>
                                            <option>Activo 4 - 4 - Categoria 1</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                    <div class="form-group mt-2">
                                        <div class="mb-1">
                                            <label>Monto</label>
                                        </div>
                                        <input type="number" class="form-control" value="50">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group mt-2">
                                        <div class="mb-1">
                                            <label>Descripcion</label>
                                        </div>
                                        <textarea rows="3" class="form-control"></textarea>
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