@extends('plantillas.admin')
@section('titulo')
    <h1 class="text-center">{!! $titulo !!}</h1>
@endsection
@section('contenido')
    <div class="spinner"></div>
    <div class="hidden table-size-optima">
        @if (Auth::check())
            @include('comun.plantillaBuscarIndex',['htmlTemplate'=>'tiposSecretariados.parciales.buscar'])
            @include('comun.plantillaOperacionesIndex',['tabla'=>'tiposSecretariados','accion'=>'Nuevo'])
            @if(!$tipoSecretariados->isEmpty())
                <table class="table-viaoptima table-striped">
                    <thead>
                    <tr class="row-fixed">
                        <th></th>
                        <th class="tabla-ancho-columna-botones"></th>
                    </tr>
                    <tr>
                        <th colspan="2" class="text-center">Listado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tipoSecretariados as $tipo_secretariado)
                        <tr @if(!$tipo_secretariado->activo) class="foreground-disabled" @endif >
                            <td>{{ $tipo_secretariado->tipo_secretariado }}</td>
                            <td class="padding-right">
                                <div class="btn-action">
                                    <a title="Editar"
                                       href="{{route('tiposSecretariados.edit', $tipo_secretariado->id)}}"
                                       class="pull-left">
                                        <i class="glyphicon glyphicon-edit">
                                            <div>Editar</div>
                                        </i>
                                    </a>
                                    @if (Auth::user()->roles->peso>=config('opciones.roles.administrador'))
                                        @if ($tipo_secretariado->activo)
                                            {!! FORM::open(array('route' => array('tiposSecretariados.destroy', $tipo_secretariado->id),
                                            'method' => 'DELETE','title'=>(config('opciones.accion.mostrarModalDeBorrado')?'':'Borrar'))) !!}
                                            <button type="@if(config('opciones.accion.mostrarModalDeBorrado'))button @else submit @endif"
                                                    @if(config('opciones.accion.mostrarModalDeBorrado'))
                                                    class="pull-right lanzarModal simpleModal"
                                                    data-modal_centro_pantalla="true"
                                                    data-modal_en_la_derecha="false"
                                                    data-modal_sin_etiqueta="true"
                                                    data-modal_ancho="330"
                                                    data-modal_cabecera_color_fondo='rgba(255,0,0,.9)'
                                                    data-modal_cabecera_color_texto='#ffffff'
                                                    data-modal_cuerpo_color_fondo='rgba(255,255,255,1)'
                                                    data-modal_cuerpo_color_texto='"#ffffff'
                                                    data-modal_pie_color_fondo='#400090'
                                                    data-modal_pie_color_texto='"#ffffff'
                                                    data-modal_posicion_vertical="220"
                                                    data-titulo="BORRAR"
                                                    data-pie="true"
                                                    data-descripcion="¿Seguro que deseas eliminar este tipo de secretariado?
                                                    <h3><strong class='green'>{{ $tipo_secretariado->tipo_secretariado}}</strong></h3>"
                                                    @endif >
                                                <i class='glyphicon glyphicon-trash full-Width'>
                                                    <div>Borrar</div>
                                                </i>
                                            </button>
                                            @if(config('opciones.accion.mostrarModalDeBorrado'))
                                                @include ("comun.plantillaBorrado")
                                            @endif
                                            {!! FORM::close() !!}
                                        @endif
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="clearfix">
                    <div class="alert alert-info" role="alert">
                        <p><strong>¡Aviso!</strong> No se ha encontrado ning&uacute;n tipo de secretariado que listar.
                        </p>
                    </div>
                </div>
            @endif
            {!! $tipoSecretariados->appends(Request::only(['tipo_secretariado','esActivo']))->render()!!}
        @else
            @include('comun.guestGoHome')
        @endif
    </div>
@endsection
@section('js')
@endsection