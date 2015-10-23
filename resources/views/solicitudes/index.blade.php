@extends('plantillas.admin')
@section('titulo')
    {!! $titulo !!}
@endsection
@section('contenido')
    <div class="spinner"></div>
    <div class="hidden table-size-optima altoMaximo">
        @if (Auth::check())
            <div class="row ">
                @include('cursillos.parciales.buscar')
            </div>
            @if(!$cursillos->isEmpty())
                @foreach ($cursillos as $cursillo)
                    <div>
                        <table class="table-viaoptima table-striped">
                            <caption>
                                {!! $cursillo->cursillo !!}
                            </caption>
                            <thead>
                            <tr style="@if($cursillo->activo==0)background: red !important; @endif">
                                <th colspan="2" class="text-right">
                                    <a title="Mostrar"
                                       href="{{route('cursillos.show',array('id'=>$cursillo->id))}}">
                                        <i class="glyphicon glyphicon-eye-open">
                                            <div>Detalles</div>
                                        </i>
                                    </a>
                                    <a title="Editar"
                                       href="{{route('cursillos.edit',array('id'=>$cursillo->id))}}">
                                        <i class="glyphicon glyphicon-edit">
                                            <div>Editar</div>
                                        </i>
                                    </a>
                                    @if ((Auth::user()->roles->peso)>=config('opciones.roles.administrador')){{--Administrador --}}
                                    {!! FORM::open(array('route' => array('cursillos.destroy',
                                    $cursillo->id),'method' => 'DELETE','title'=>'Borrar')) !!}
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
                                <td class="table-autenticado-columna-1">Comunidad:</td>
                                <td>
                                    {!! $cursillo->comunidad !!}
                                </td>
                            </tr>
                            <tr>
                                <td>Número:</td>
                                <td>{!!$cursillo->num_cursillo!!}</td>
                            </tr>
                            <tr>
                                <td>Año:</td>
                                <td>{!! Date("Y" , strtotime($cursillo->fecha_inicio) )!!}</td>
                            </tr>
                             <tr>
                                <td>Semana:</td>
                                <td>{!! Date("W" , strtotime($cursillo->fecha_inicio) )!!}</td>
                            </tr>
                            <tr>
                                <td>Asistentes:</td>
                                <td>{!!$cursillo->tipo_participante!!}</td>
                            </tr>
                            <tr>
                                <td>Activo:</td>
                                <td> @if ($cursillo->activo ) Si @else No @endif </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                @endforeach
            @else
                <div class="clearfix">
                    <div class="alert alert-info" role="alert">
                        <p><strong>¡Aviso!</strong> No se ha encontrado ningun cursillo que listar.</p>
                    </div>
                </div>
            @endif
            <div class="row text-center">
                {!! $cursillos->appends(Request::only(['cursillo','semanas','anyos']))->render()
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