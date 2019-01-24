@extends('layouts.dashboard-suministros')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-clipboard fa-2x"></i>
                    </div>
                    <h3 class="card-title">Kardex</h3>

                </div>
                <div class="card-body">
                    <form method="GET" action="{{url('sum/mov-suministros/kardex')}}" autocomplete="off">
                <div class="input-group">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group mt-2">
                            <div class="mb-1">
                                <label>Desde</label>
                            </div>
                            <input type="date" class="form-control" name="fecha_ingreso"  required value="{{\Carbon\Carbon::now('America/La_Paz')->toDateString()}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group mt-2">
                            <div class="mb-1">
                                <label>Hasta</label>
                            </div>
                            <input type="date" class="form-control" name="fecha_factura"  required value="{{\Carbon\Carbon::now('America/La_Paz')->toDateString()}}">
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Suministro</label>
                            <select class="form-control selectpicker" data-live-search="true"
                                    data-style="btn btn-link" id="sumi_cab">
                                @foreach($suministros as $suministro)
                                    <option value="{{$suministro->id}}">{{$suministro -> nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <span class="input-group-btn">
                         <button type="submit" class="btn btn-fab btn-round btn-primary">
                         <i class="fa fa-search"></i>
                         </button>
                         <a href="{{url('sum/reportes/movimientos/ingresosPDF')}}">
                         <button type="button" class="btn btn-fab btn-round btn-primary" title="Descargar PDF" >
                         <i class="fa fa-file-pdf"></i>
                         </button>
                         </a>
                    </span>
                <br>
                <br>
                <br>

                <div class="table-responsive">
                    <table class="table table-hover table-striped ">
                        <thead>
                        <tr>
                            <th><b>Fecha</b></th>
                            <th><b>Movimiento</b></th>
                            <th><b>Documento</b></th>
                            <th><b>Cantidad</b></th>
                            <th><b>Saldo</b></th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@foreach($ingresos as $ingreso)--}}
                            {{--<tr>--}}
                                {{--<td>{{$ingreso -> id}}</td>--}}
                                {{--<td>{{Carbon\Carbon::parse($ingreso -> fecha_ingreso)->format('d/m/Y h:i A')}}</td>--}}
                                {{--<td>{{$ingreso -> proveedor}}</td>--}}
                                {{--<td>{{$ingreso -> nro_factura}}</td>--}}
                                {{--<td>{{$ingreso -> estado}}</td>--}}
                                {{--<td class="text-right ">--}}
                                    {{--<a href="{{url('sum/mov-suministros/ingresos/'.$ingreso -> id)}}">--}}
                                        {{--<button class="btn btn-outline-primary btn-sm">--}}
                                            {{--<i class="fa fa-eye"></i>--}}
                                        {{--</button>--}}
                                    {{--</a>--}}
                                    {{--@if($ingreso -> estado != 'Anulado')--}}
                                        {{--<button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminarModelo('{{$ingreso -> id}}', '{{url('sum/mov-suministros/ingresos/'.$ingreso -> id)}}')">--}}
                                            {{--<i class="fa fa-times"></i>--}}
                                        {{--</button>--}}
                                    {{--@else--}}
                                        {{--<button type="button" class="btn btn-outline-primary btn-sm" disabled>--}}
                                            {{--<i class="fa fa-times"></i>--}}
                                        {{--</button>--}}
                                    {{--@endif--}}




                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                        </tbody>
                    </table>
                </div>
            </div>

    </div>


@endsection