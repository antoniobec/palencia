@extends('plantillas.admin')
@section('titulo')
    {!! $titulo !!}
@endsection
@section('contenido')
    <div class="spinner"></div>
    <div class="hidden table-size-optima altoMaximo">
        {!! FORM::open(['route' => 'comunidades.store']) !!}
        @include('comunidades.Parciales.nuevoYmodificar')
        <div class="btn-action  margin-bottom">
            <a title="Volver" href="{{route('comunidades.index')}}" class="pull-left">
                <i class="glyphicon glyphicon-arrow-left">
                    <div>Volver</div>
                </i>
            </a>
            <button type="submit" title="Crear" class="pull-right">
                <i class='glyphicon glyphicon-plus full-Width'>
                    <div>Crear</div>
                </i>
            </button>
        </div>
        {!! FORM::close() !!}
    </div>
@endsection
@section("css")
@stop
@section('js')
    {!! HTML::script('js/comun/direccion.js') !!}
@endsection