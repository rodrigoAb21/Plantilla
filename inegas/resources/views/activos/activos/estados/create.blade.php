@extends('layouts.dashboard-activos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-file-medical-alt fa-2x"></i>
                    </div>
                    <h3 class="card-title">Nuevo Estado para el activo: {{$activo -> codigo}}</h3>
                </div>
                <form method="POST" action="{{url('act/activos/'.$activo -> id.'/estados')}}" autocomplete="off">
                    <div class="card-body ">
                        {{csrf_field()}}

                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <select class="form-control selectpicker" data-live-search="true"
                                            data-style="btn btn-link" name="estado_id">
                                        @foreach($estados as $estado)
                                            <option value="{{$estado->id}}">{{$estado -> nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Motivo</label>
                                    <textarea name="motivo" class="form-control" rows="3"></textarea>
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