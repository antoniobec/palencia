@extends('plantillas.admin')
@section('titulo')
    <h1 class="text-center">{!! $titulo !!}</h1>
@endsection
@section('contenido')
    <div class="spinner"></div>
    <div class="hidden table-size-optima altoMaximo">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if (Auth::check())
            <div class="row ">
                @include('solicitudesEnviadas.parciales.buscar')
            </div>
            @if(!$solicitudesEnviadas->isEmpty())
                @foreach ($solicitudesEnviadas as $solicitudEnviada)
                    <div>
                        <table class="table-viaoptima table-striped">
                            <caption>
                                {!! $solicitudEnviada->cursillo !!}
                            </caption>
                            <thead>
                            <tr style="@if($solicitudEnviada->activo==0)background: red !important; @endif">
                                <th colspan="2" class="text-right">
                                    <a title="Editar"
                                       href="{{route('solicitudesEnviadas.edit',array('id'=>$solicitudEnviada->id))}}">
                                        <i class="glyphicon glyphicon-edit">
                                            <div>Editar</div>
                                        </i>
                                    </a>
                                    @if ((Auth::user()->roles->peso)>=config('opciones.roles.administrador')){{--Administrador --}}
                                    {!! FORM::open(array('route' => array('solicitudesEnviadas.destroy',
                                    $solicitudEnviada->id),'method' => 'DELETE','title'=>'Borrar')) !!}
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
                            <tr>
                                <td class="table-autenticado-columna-1">Solicitud Id:</td>
                                <td>
                                    {!! $solicitudEnviada->id !!}
                                </td>
                            </tr>
                            <tr>
                                <td>Comunidad:</td>
                                <td>{!!$solicitudEnviada->comunidad!!}</td>
                            </tr>
                            <tr>
                                <td>Año Cursillo:</td>
                                <td>{!! Date("Y" , strtotime($solicitudEnviada->fecha_inicio) )!!}</td>
                            </tr>
                            <tr>
                                <td>Semana Cursillo:</td>
                                <td>{!! Date("W" , strtotime($solicitudEnviada->fecha_inicio) )!!}</td>
                            </tr>
                            <tr>
                                <td>Activo:</td>
                                <td> @if ($solicitudEnviada->activo ) Si @else No @endif </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                @endforeach
            @else
                <div class="clearfix">
                    <div class="alert alert-info" role="alert">
                        <p><strong>¡Aviso!</strong> No se ha encontrado ninguna solicitud que listar.</p>
                    </div>
                </div>
            @endif
            <div class="row text-center">
                {!! $solicitudesEnviadas->appends(Request::only(['semanas','anyos']))->render()
                !!}{{-- Poner el paginador --}}
            </div>
        @else
            @include('comun.guestGoHome')
        @endif
    </div>
@endsection
@section('js')
    {!! HTML::script('js/comun/semanas.js') !!}
@endsection
