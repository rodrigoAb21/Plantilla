<li  id="{{$ubicacion['id']}}" onmouseover=mostrarOpciones(this.id) onmouseleave=ocultar(this.id) ondblclick="modalEdit('{{$ubicacion->nombre}}','{{url('/act/ubicaciones/editar/'.$ubicacion->id)}}')">
    {{ $ubicacion['nombre']}}
    <i id="bMas-{{$ubicacion['id']}}" class="fa fa-plus" hidden onclick="modalCreate('{{url('act/ubicaciones/create/'.$ubicacion['id'])}}')"></i>
    <i id="bQuitar-{{$ubicacion['id']}}" class="fa fa-window-close" hidden onclick="modalEliminar('{{$ubicacion['nombre']}}','{{url('/act/ubicaciones/eliminar/'.$ubicacion->id)}}')"></i>
</li>
@if (count($ubicacion['hijos']) > 0)
    <ul>
        @foreach($ubicacion['hijos'] as $ubicacion)
            @include('activos.ubicaciones.recursivos.metodo', $ubicacion)
        @endforeach
    </ul>
@endif
@include('modal')
@push('scripts')
    <script>
        function mostrarOpciones(id) {
            $('#bMas-'+id).attr("hidden",false);
            $('#bQuitar-'+id).attr("hidden",false);

        }

        function ocultar(id) {
            $('#bMas-'+id).attr("hidden",true);
            $('#bQuitar-'+id).attr("hidden",true);
        }

        function modalEliminar(nombre, url) {
            $('#modalEliminarForm').attr("action", url);
            $('#metodo').val("post");
            $('#modalEliminarTitulo').html("Eliminar Ubicacion");
            $('#modalEliminarEnunciado').html("Realmente desea eliminar la ubicacion: " + nombre + "?");
            $('#modalEliminar').modal('show');

        }

    </script>
@endpush