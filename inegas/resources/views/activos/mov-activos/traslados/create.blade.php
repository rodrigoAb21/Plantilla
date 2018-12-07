@extends('layouts.dashboard-activos')

@section('content')
    <form method="POST" action="{{url('act/mov-activos/traslados')}}" autocomplete="off">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-dolly-flatbed fa-2x"></i>
                    </div>
                    <h3 class="card-title">Traslados</h3>
                </div>

                <div class="card-body ">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group mt-2">
                                <div class="mb-1">
                                    <label>Fecha</label>
                                </div>
                                <input type="date" class="form-control" name="fecha" value="{{\Carbon\Carbon::now('America/La_Paz')->toDateString()}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Ubicaciones</label>
                                <select class="form-control selectpicker" data-live-search="true"
                                        data-style="btn btn-link" id="grupo_cab">
                                    @foreach($ubicaciones as $ubicacion)
                                        <option value="{{$ubicacion -> id}}">{{$ubicacion -> nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                            <div class="form-group mt-2">
                                <div class="mb-1">
                                    <label>Observacion</label>
                                </div>
                                <textarea name="observacion" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-clipboard-list fa-2x"></i>
                    </div>
                    <h3 class="card-title">Detalle</h3>
                </div>

                    <div class="card-body ">
                        <div class="table-responsive table-bordered table-hover table-striped">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th scope="col" ><b>#</b></th>
                                    <th scope="col" class="w-75"><b>Activo</b></th>
                                    <th scope="col" class="text-right"><b>Opciones</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Escritorio#11</td>
                                        <td class="text-right ">
                                            <button type="button" class="btn btn-outline-primary">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Escritorio#13</td>
                                        <td class="text-right ">
                                            <button type="button" class="btn btn-outline-primary">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Computadora#21</td>
                                        <td class="text-right ">
                                            <button type="button" class="btn btn-outline-primary">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Impresora#9</td>
                                        <td class="text-right ">
                                            <button type="button" class="btn btn-outline-primary">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="card-footer ">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>

            </div>
            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    </form>
    <!-- end row -->
@endsection