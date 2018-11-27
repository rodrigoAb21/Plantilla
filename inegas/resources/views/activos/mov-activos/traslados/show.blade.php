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
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                        <label>ID</label>
                                        <p>1</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                        <label>Estado</label>
                                        <p>Realizado</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label >Fecha</label>
                                        <p>20/11/2018 10:09</p>
                                </div>
                            </div>

                            <div class="input-group">
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">

                                        <label>Origen</label>
                                        <p>Finanzas</p>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">

                                    <label>Destino</label>
                                    <p>RRHH</p>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">

                                        <label>Solicita</label>
                                        <p>Marina Toledo</p>

                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                        <label>Observacion</label>
                                        <p>Ninguna.</p>

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
                                    <th scope="col" class="w-75"><b>Suministro</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Escritorio#1</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Mesa#20</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Silla#2</td>
                                </tr>
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