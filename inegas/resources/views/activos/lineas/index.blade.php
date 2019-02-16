@extends('layouts.dashboard-activos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-tags fa-2x"></i>
                    </div>
                    <h3 class="card-title">Lineas</h3>

                </div>
                <div class="card-body">

                    <form method="GET" action="{{url('act/lineas')}}" autocomplete="off">
                        <div class="form-group form-file-upload form-file-multiple">
                            <div class="input-group">
                                <label for="busqueda" class="bmd-label-floating">Buscar</label>
                                <input type="text" class="form-control" id="busqueda" name="busqueda" value="{{$busqueda}}" >
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn-fab btn-round btn-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <a class="btn btn-fab btn-round btn-primary" href="{{url('act/lineas/create')}}">
                                                <i id="plus-plus" class="fa fa-plus"></i>
                                        </a>
                                    </span>

                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover table-striped ">
                            <thead>
                                <tr>
                                    <th><b>#</b></th>
                                    <th><b>Nombre</b></th>
                                    <th class="text-right"><b>Opciones</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lineas as $linea)
                                    <tr>
                                        <td>{{$linea -> id}}</td>
                                        <td>{{$linea -> nombre}}</td>
                                        <td class="text-right ">
                                            <a href="{{url('act/lineas/'.$linea -> id.'/edit')}}">
                                                <button class="btn btn-outline-primary btn-sm">
                                                    <i class="fa fa-pen"></i>
                                                </button>
                                            </a>
                                            {{--<button type="button" class="btn btn-outline-primary btn-sm" onclick="modalEliminar('{{$linea -> nombre}}', '{{url('act/lineas/'.$linea -> id)}}')">--}}
                                                {{--<i class="fa fa-times"></i>--}}
                                            {{--</button>--}}
                                            {!! Form::open(['route'=>['eliminarL',$linea->id],'method'=>'DELETE']) !!}
                                                <button type="button" class="btn btn-outline-primary btn-sm btn-delete">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{$lineas -> appends(Request::except('page'))->links('pagination.default')}}
                </div>
            </div>
            <div id="muestra" hidden >
                <table class="tabla">
                    <tr><th>Tabla</th><th>de ejemplo</th></tr>
                    <tr><td>datos...</td><td>datos....</td></tr>
                    <tr><td>datos...</td><td>datos...</td></tr>
                </table>
            </div>
            <a href="javascript:imprSelec('muestra')">Imprimir Tabla</a>

            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->

    @include('modal')
    @push('scripts')
        <script>
            $(document).ready(function () {
                console.log("ok");
                $('.btn-delete').click(function (e) {
                    e.preventDefault();
                    var row =$(this).parents('tr');
                    var form =$(this).parents('form');
                    var url = form.attr('action');

                    $.post(url,form.serialize(),function () {
                        row.fadeOut('slow');
                    });


                    var ficha=document.getElementById('muestra');
                    // var ventimp=window.open(ficha,'popimpr');
                    // ventimp.document.write(ficha.innerHTML);
                    // ventimp.document.close();
                    // ventimp.print();
                    // ventimp.close();
                    ficha.print();



                });

            })

            function imprSelec(muestra)
            {
                // e.preventDefault();
            var ficha=document.getElementById(muestra);
            var ventimp=window.open("act/lineas/41",'popimpr');
            ventimp.document.write(ficha.innerHTML);
            ventimp.document.close();
            ventimp.focus();
            ventimp.print();
            ventimp.close();
            }

            function modalEliminar(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#modalEliminarTitulo').html("Eliminar Linea");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar la Linea: " + nombre + "?");
                $('#modalEliminar').modal('show');

            }

            function print(printHtml) {
                var urlCss = "http://tuFicheroCssAqui.css";
                var iframe = document.createElement('iframe');
                var div = document.createElement('div');
                var tagStyle = document.createElement('link');
                tagStyle.setAttribute("rel","stylesheet");
                tagStyle.setAttribute("type","text/css");
                tagStyle.setAttribute("href",urlCss);
                tagStyle.onload = function () {
                    openPrint(iframe);
                }
                div.innerHTML = printHtml
                document.body.appendChild(iframe);
                iframe.contentDocument.body.appendChild(div);
                iframe.contentDocument.head.appendChild(tagStyle);
            }

            function openPrint(iframe) {
                if (navigator.userAgent.toLowerCase().indexOf("firefox") != -1) {
                    iframe.contentWindow.print();
                } else {
                    iframe.contentWindow.document.execCommand('print', false, null);
                }

                document.body.removeChild(iframe);
            }



        </script>

    @endpush()

@endsection