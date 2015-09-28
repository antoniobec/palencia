@extends('plantillas.admin')
@section('titulo')
    {!! $titulo !!}
@endsection
@section('contenido')
    <div class="spinner"></div>
    <div class="hidden table-size-optima">
            {!! FORM::open(['route' => 'roles.store']) !!}
            @include('roles.parciales.nuevoYmodificar')
            <div class="btn-action">
                <a title="Volver" href="{{route('roles.index')}}" class="pull-left">
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
@endsection

