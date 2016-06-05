@extends('plantillas.admin')
@section('titulo')
    <h1 class="text-center">{!! $titulo !!}</h1>
@endsection
@section('contenido')
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="hidden table-size-optima altoMaximo">
        @if (Auth::check())
            <div class="row ">
                {!! FORM::open(['route'=>'imprimirSecretariadosColaboradoresSinResponder','method'=>'POST']) !!}
                <div class="heading-caption">Seleccione el país para imprimir los secretariados ...</div>
                {!! FORM::label('pais', 'País') !!} <br/>
                {!! FORM::select('pais', $paises, null,array("class"=>"form-control",'id'=>'select_paises'))!!}
                @include('comun.plantillaVolverModificarGuardar',['accion'=>"Descargar"])
                {!! FORM::close() !!}
            </div>
        @else
            @include('comun.guestGoHome')
        @endif
    </div>
@endsection
@section('js')
@endsection
