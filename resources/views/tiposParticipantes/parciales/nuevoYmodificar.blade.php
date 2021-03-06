<div class="form-group">
    <div class="heading-caption">Datos Generales</div>
    {!! FORM::label('tipoParticipante', 'Tipo Participantes') !!} <br/>
    {!! FORM::text('tipo_participante', $tipoParticipante->tipo_participante, ["class" => "form-control", "title"=>"Tipo de participante"]) !!}
    <br/>
    @if (Auth::check())
        @if(Auth::user()->roles->peso>=config('opciones.roles.administrador'))
            <div class="heading-caption">Zona Administrador</div>
            {!! FORM::label ('estado', 'Activo') !!} <br/>
            {!! FORM::select('activo',array('1'=>'Si','0'=>'No'), $tipoParticipante->activo,array('class'=>'form-control')) !!}
        @endif
    @endif
</div>
