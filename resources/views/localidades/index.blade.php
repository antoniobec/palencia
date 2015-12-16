@extends('plantillas.admin')
@section('titulo')
    <h1 class="text-center">{!! $titulo !!}</h1>
@endsection
@section('contenido')
    <div class="spinner"></div>
    <div class="hidden table-size-optima altoMaximo">
        @if (Auth::check())
            <div class="row ">
                @include('localidades.parciales.buscar')
                @if(!$localidades->isEmpty())
                    @foreach ($localidades as $localidad)
                        <div class="full-Width">
                            <table class="table-viaoptima table-striped">
                                <caption
                                        class="label-default text-center  @if(!$localidad->activo) foreground-disabled @else alert-warning @endif">
                                    {{ $localidad->localidad }}
                                </caption>
                                <thead>
                                <tr @if(!$localidad->activo) class="background-disabled" @endif>
                                    <th colspan="2" class="text-right">
                                        <a title="Editar"
                                           href="{{route('localidades.edit',array('id'=>$localidad->id))}}">
                                            <i class="glyphicon glyphicon-edit">
                                                <div>Editar</div>
                                            </i>
                                        </a>

                                        @if ((Auth::user()->roles->peso)>=config('opciones.roles.administrador')){{--Administrador --}}
                                        {!! FORM::open(array('route' => array('localidades.destroy',
                                        $localidad->id),'method' => 'DELETE','title'=>'Borrar')) !!}
                                        <button type="submit">
                                            <i class='glyphicon glyphicon-trash full-Width'>
                                                <div>Borrar</div>
                                            </i>
                                        </button>
                                        {!! FORM::close() !!}
                                        @endif
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr @if(!$localidad->activo) class="foreground-disabled" @endif>
                                    <td class="table-autenticado-columna-1">País:</td>
                                    <td>{{ $localidad->pais }}</td>
                                </tr>
                                <tr @if(!$localidad->activo) class="foreground-disabled" @endif>
                                    <td>Provincia:</td>
                                    <td>{{ $localidad->provincia }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                @else
                    <div class="clearfix">
                        <div class="alert alert-info" role="alert">
                            <p><strong>¡Aviso!</strong> No se ha encontrado ninguna localidad que
                                listar.</p>
                        </div>
                    </div>
                @endif
                <div class="row paginationBlock">
                    {!! $localidades->appends(Request::only(['localidad']))->render()
                    !!}{{-- Poner el paginador --}}
                </div>
                @else
                    @include('comun.guestGoHome')
                @endif
            </div>
    </div>
@endsection
@section('js')
    {!! HTML::script("js/comun/direccion.js")!!}
@endsection