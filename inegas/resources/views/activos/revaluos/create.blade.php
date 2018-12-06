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

                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="activo">Codigo/Grupo/Costo</label>
                                        <select class="form-control selectpicker" data-live-search="true" data-style="btn btn-link" name="activo_fijo_id">
                                            @foreach($activos as $activo)
                                                <option value="{{$activo -> id}}">{{$activo -> codigo.' / '.$activo -> grupo.' / '.$activo -> costo_actual.'Bs'}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group mt-2">
                                        <div class="mb-1">
                                            <label>Monto Bs</label>
                                        </div>
                                        <input type="number" step="any" class="form-control" name="monto">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group mt-2">
                                        <div class="mb-1">
                                            <label>Motivo</label>
                                        </div>
                                        <textarea rows="3" class="form-control" name="motivo"></textarea>
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