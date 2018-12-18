@extends('layouts.dashboard-activos')

@section('content')

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


                            <div class="input-group">
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-6">
                                    <label>ID</label>
                                    <p>{{$asignacion -> id}}</p>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                        <label>Fecha</label>
                                    <p>{{$asignacion -> fecha}}</p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                        <label>Ubicacion</label>
                                    <p>{{$asignacion -> ubicacion}}</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label >Responsable</label>
                                    <p>{{$asignacion -> responsable}}</p>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                    <label >Cargo</label>
                                    <p>{{$asignacion -> cargo}}</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label >Observacion</label>
                                    <p>{{$asignacion -> observacion}}</p>
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
                                    <th scope="col"><b>Activo Fijo</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($activos as $activo)
                                    <tr>
                                        <td>{{$loop -> iteration}}</td>
                                        <td>{{'COD: '.$activo -> codigo.', '.$activo -> linea.' - '.$activo -> grupo}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
    <!-- end row -->
@endsection