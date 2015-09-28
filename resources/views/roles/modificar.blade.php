@extends('plantillas.admin')
@section('titulo')
    {!! $titulo !!}
@endsection
@section('contenido')
    <div class="spinner"></div>
    <div class="hidden table-size-optima">
        <div class="row">

            {!! FORM::model($roles, ['route' => ['roles.update', $roles->id], 'method' => 'patch']) !!}

            @include('roles.parciales.nuevoYmodificar')

            <div class="btn-action">
                <a title="Volver" href="{{route('roles.index')}}" class="pull-left">
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
    </div>
@endsection
@section("css")

@stop
@section('js')

@endsection