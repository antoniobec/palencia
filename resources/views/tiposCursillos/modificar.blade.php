@extends('plantillas.admin')
@section('titulo')
    {!! $titulo !!}
@endsection
@section('contenido')
    <div class="spinner"></div>
    <div class="hidden table-size-optima altoMaximo">
        {!! FORM::model($tipos_cursillos, ['route' => ['tiposCursillos.update', $tipos_cursillos->id], 'method' => 'patch']) !!}
        @include('tiposCursillos.parciales.nuevoYmodificar')
        <div class="btn-action margin-bottom">
            <a title="Volver" href="{{route('tiposCursillos.index')}}" class="pull-left">
                <i class="glyphicon glyphicon-arrow-left">
                    <div>Volver</div>
                </i>
            </a>
            <button type="submit" title="Guardar" class="pull-right">
                <i class='glyphicon glyphicon-floppy-disk full-Width'>
                    <div>Guardar</div>
                </i>
            </button>
        </div>
        {!! FORM::close() !!}
    </div>
    <script>
        $(document).ready(function() {
            $('#select-color').simplecolorpicker({picker: true, theme: 'glyphicons'});
        });
    </script>
@endsection
@section("css")
    {!! HTML::style("css/vendor/ColorPicker/jquery.simplecolorpicker.css")!!}
@stop
@section('js')
    {!! HTML::script("js/vendor/ColorPicker/jquery.simplecolorpicker.js")!!}
@endsection