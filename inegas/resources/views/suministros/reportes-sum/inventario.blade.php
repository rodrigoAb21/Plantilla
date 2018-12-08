@extends('layouts.dashboard-suministros')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="text-right">Visitas: {{$visitas -> cant}}</p>
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-boxes fa-2x"></i>
                    </div>
                    <h3 class="card-title">Inventario de Suministros</h3>

                </div>
                <div class="card-body">
                    <form method="GET" action="{{url('sum/reportes/inventario')}}" autocomplete="off">
                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                <label for="busqueda" class="bmd-label-floating">Buscar</label>
                                <input type="text" class="form-control" id="busqueda" name="busqueda" value="{{$busqueda}}" >
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn-fab btn-round btn-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <a href="{{url('/sum/reportes/inventarioPDF')}}">
                                            <button type="button" class="btn btn-fab btn-round btn-primary" title="Descargar PDF" >
                                                <i class="fa fa-file-pdf"></i>
                                            </button>
                                        </a>
                                    </span>

                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover table-striped ">
                            <thead>
                                <tr>
                                    <th><b>Codigo</b></th>
                                    <th><b>Nombre</b></th>
                                    <th><b>Marca</b></th>
                                    <th><b>Stock</b></th>
                                    <th><b>U. Medida</b></th>
                                    <th><b>Linea - Grupo</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($suministros as $suministro)
                                    @if($suministro -> stock < $suministro -> stock_minimo)
                                        <tr class="table-warning">
                                            <td>{{$suministro -> codigo}}</td>
                                            <td>{{$suministro -> nombre}}</td>
                                            <td>{{$suministro -> marca}}</td>
                                            <td>{{$suministro -> stock}}</td>
                                            <td>{{$suministro -> medida}}</td>
                                            <td>{{$suministro -> linea.' - '.$suministro -> grupo}}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>{{$suministro -> codigo}}</td>
                                            <td>{{$suministro -> nombre}}</td>
                                            <td>{{$suministro -> marca}}</td>
                                            <td>{{$suministro -> stock}}</td>
                                            <td>{{$suministro -> medida}}</td>
                                            <td>{{$suministro -> linea.' - '.$suministro -> grupo}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{$suministros -> links('pagination.default')}}
                </div>
            </div>

            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->

@endsection