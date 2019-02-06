@extends('layouts.dashboard-activos')

@section('content')
    @if (count($ubicaciones) > 0)
        <ul>
            @foreach ($ubicaciones as $ubicacion)
                @include('activos.ubicaciones.recursivos.metodo', $ubicacion)
            @endforeach
        </ul>
    @endif
    <button  onclick="modalCreate('{{url('act/ubicaciones/create/0')}}')" >
        Nueva Ubicacion</button>

@include('activos.ubicaciones.modal')
{{--@include('modal')--}}
@push('scripts')

    <script>

        function modalCreate(url) {
            $('#modalForm').attr("action", url);
            $('#modalTitulo').html("Nueva Ubicacion");
            $('#nombre').val('');
            $('#metodo').val('');
            $('#modalGrupo').modal('show');
        }

        function modalEdit(nombre, url) {
            $('#modalForm').attr("action", url);
            $('#metodo').val('patch');
            $('#nombreGrupo').val(nombre);
            $('#modalTitulo').html("Editar Ubicacion");
            $('#modalGrupo').modal('show');
        }
        //
        // function eliminarGrupo(nombre, url) {
        //     $('#modalEliminarForm').attr("action", url);
        //     $('#modalEliminarTitulo').html("Eliminar Grupo");
        //     $('#modalEliminarEnunciado').html("Realmente desea eliminar el grupo: " + nombre + "?");
        //     $('#modalEliminar').modal('show');
        // }
    </script>

@endpush()

@endsection