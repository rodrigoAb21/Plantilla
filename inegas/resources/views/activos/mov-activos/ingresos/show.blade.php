@extends('layouts.dashboard-activos')

@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-arrow-right fa-2x"></i>
                        </div>
                        <h3 class="card-title">Ingreso de Suministros</h3>
                    </div>

                    <div class="card-body ">

                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    <div class="form-group">
                                        <label>ID</label>
                                        <p>1</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <p>Realizado</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label >Fecha</label>
                                        <p>20/11/2018 10:09</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label >Nro de factura</label>
                                        <p>10258464</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label >Imagen</label><br>
                                        <img src="{{asset('img/product1.jpg')}}" height="100px">
                                    </div>
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
                        <div>
                            <div class="card-body" style="width: 20rem;">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 float-left">
                                    <img src="{{asset('img/product1.jpg')}}" height="100px">
                                </div>
                                <div class="float-right">
                                    <h4 class="card-title">Artículo</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">Costo</h6>
                                    <p>Descripción...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div>
                            <div class="card-body" style="width: 20rem;">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 float-left">
                                    <img src="{{asset('img/product1.jpg')}}" height="100px">
                                </div>
                                <div class="float-right">
                                    <h4 class="card-title">Artículo</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">Costo</h6>
                                    <p>Descripción...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div>
                            <div class="card-body" style="width: 20rem;">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 float-left">
                                    <img src="{{asset('img/product1.jpg')}}" height="100px">
                                </div>
                                <div class="float-right">
                                    <h4 class="card-title">Artículo</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">Costo</h6>
                                    <p>Descripción...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
    <!-- end row -->
@endsection