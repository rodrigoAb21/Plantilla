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
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group mt-2">
                            <div class="mb-1">
                                <label>Solicita</label>
                            </div>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <br>
                    {{--<div class="row">--}}

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 float-left" >
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Origen</label>
                                <select class="form-control selectpicker" data-live-search="true" data-style="btn btn-link" id="exampleFormControlSelect1">
                                    <option>Finanzas</option>
                                    <option>RR.HH.</option>
                                    <option>Publicidad</option>
                                    <option>Administracion</option>
                                    <option>Informatica</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12 float-right">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Destino</label>
                                <select class="form-control selectpicker" data-live-search="true" data-style="btn btn-link" id="exampleFormControlSelect1">
                                    <option>Finanzas</option>
                                    <option>RR.HH.</option>
                                    <option>Publicidad</option>
                                    <option>Administracion</option>
                                    <option>Informatica</option>
                                </select>
                            </div>
                        </div>


                    {{--</div>--}}

                    <br><br><br>
                    <div class="form-group form-file-upload form-file-multiple  row">
                        <div class="input-group">
                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Activo</label>
                                    <select class="form-control selectpicker" data-live-search="true" data-style="btn btn-link" id="exampleFormControlSelect1">
                                        <option>Mesa#4</option>
                                        <option>Mesa#5</option>
                                        <option>Mesa#6</option>
                                        <option>Escritorio#20</option>
                                        <option>Escritorio#21</option>
                                        <option>Estante#9</option>
                                        <option>Estante#15</option>
                                        <option>CD-ROM Pack100</option>
                                    </select>
                                </div>
                            </div>

                            <span class="input-group-btn pt-4 ml-auto mr-0">
                            <button type="button" class="btn btn-fab btn-round btn-primary">
                                <i class="fa fa-plus"></i>
                            </button>
                        </span>


                        </div>
                    </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group mt-2">
                                <div class="mb-1">
                                    <label>Observacion</label>
                                </div>
                                <textarea rows="3" class="form-control"></textarea>
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