@extends('plantillas.admin')
@section('titulo')
    {!! $titulo !!}
@endsection
@section('contenido')
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="spinner"></div>
    <div class="hidden table-size-optima altoMaximo">
        @if (Auth::check())
            <div class="row ">
                {!! FORM::open(['route'=>'imprimirSecretariado','method'=>'POST']) !!}
                <div class="heading-caption">Seleccione el secretariado a imprimir ...</div>
                {!! FORM::label('comunidad', 'Secretariado') !!} <br/>
                {!! FORM::select('comunidad', $comunidades, null,array("class"=>"form-control",'id'=>'select_comunidad'))!!}
                <br/>

                <div class="btn-action margin-bottom">
                    <a title="Inicio" href="{{route('inicio')}}" class="pull-left">
                        <i class="glyphicon glyphicon-home">
                            <div>Inicio</div>
                        </i>
                    </a>
                    <button type="submit" title="Enviar" class="pull-right">
                        <i class='glyphicon glyphicon-print full-Width'>
                            <div>Imprimir</div>
                        </i>
                    </button>
                </div>
                {!! FORM::close() !!}
            </div>
        @else
            @include('comun.guestGoHome')
        @endif
    </div>
@endsection
@section('js')
    {!! HTML::script('js/comun/semanas.js') !!}
@endsection
