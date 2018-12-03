@extends('layouts.dashboard-suministros')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-box-open fa-2x"></i>
                    </div>
                    <h3 class="card-title">Editar Suministro</h3>
                </div>
                <form method="POST" action="{{url('sum/suministros/'.$suministro->id)}}" autocomplete="off">
                    <div class="card-body ">
                        {{csrf_field()}}
                        {{method_field('patch')}}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label for="nombre" >Nombre</label>
                                    </div>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$suministro -> nombre}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label for="marca" >Marca</label>
                                    </div>
                                    <input type="text" class="form-control" id="marca" name="marca" value="{{$suministro -> marca}}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Unidad de Medida</label>
                                    <select class="form-control selectpicker" data-live-search="true" data-style="btn btn-link" name="unidad_medida_id">
                                        @foreach($medidas as $medida)
                                            @if($medida -> id == $suministro -> unidad_medida_id)
                                            <option selected value="{{$medida -> id}}">{{$medida -> nombre}}</option>
                                            @else
                                                <option value="{{$medida -> id}}">{{$medida -> nombre}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Linea - Grupo</label>
                                    <select class="form-control selectpicker" data-live-search="true" data-style="btn btn-link" name="grupo_s_id">
                                        @foreach($grupos as $grupo)


                                            @if($grupo -> id == $suministro -> grupo_s_id)
                                                <option selected value="{{$grupo -> id}}">{{$grupo -> linea.' - '.$grupo -> grupo }}</option>
                                            @else
                                                <option value="{{$grupo -> id}}">{{$grupo -> linea.' - '.$grupo -> grupo }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label for="min" >Stock Min.</label>
                                    </div>
                                    <input type="number" class="form-control" id="min" name="stock_minimo" value="{{$suministro -> stock_minimo}}">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label for="max" >Stock Max.</label>
                                    </div>
                                    <input type="number" class="form-control" id="max" name="stock_maximo"  value="{{$suministro -> stock_maximo}}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="max" >Descripcion</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3"> {{$suministro -> descripcion}}</textarea>
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