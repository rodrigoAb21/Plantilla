@extends('layouts.dashboard-suministros')

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
                        <i class="fa fa-box-open fa-2x"></i>
                    </div>
                    <h3 class="card-title">Nuevo Suministro</h3>
                </div>
                <form method="POST" action="{{url('sum/suministros')}}" autocomplete="off">
                <div class="card-body ">
                    {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label for="nombre" >Nombre</label>
                                    </div>
                                    <input type="text" class="form-control"  value="{{old('nombre')}}"  name="nombre" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label for="marca" >Marca</label>
                                    </div>
                                    <input type="text" class="form-control" value="{{old('marca')}}"  name="marca" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Unidad de Medida</label>
                                    <select class="form-control selectpicker" data-live-search="true" data-style="btn btn-link" name="unidad_medida_id">
                                        @foreach($medidas as $medida)
                                            <option value="{{$medida -> id}}">{{$medida -> nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Linea - Grupo</label>
                                    <select class="form-control selectpicker" data-live-search="true" data-style="btn btn-link" name="grupo_s_id">
                                        @foreach($grupos as $grupo)
                                            <option value="{{$grupo -> id}}">{{$grupo -> linea.' - '.$grupo -> grupo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label for="min" >Stock Min.</label>
                                    </div>
                                    <input type="number" class="form-control" id="min"  value="{{old('stock_minimo')}}"  name="stock_minimo" required>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group mt-2">
                                    <div class="mb-1">
                                        <label for="max" >Stock Max.</label>
                                    </div>
                                    <input type="number" class="form-control" id="max" value="{{old('stock_maximo')}}"  name="stock_maximo" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="max" >Descripcion</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3" required> {{old('descripcion')}} </textarea>
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