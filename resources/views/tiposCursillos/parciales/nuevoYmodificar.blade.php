<div class="form-group">
    <div class="heading-caption">Datos Generales</div>
    {!! FORM::label('tipoParticipante', 'Tipo cursillo') !!} <br/>
    {!! FORM::text('cursillo', $tipos_cursillos->tipo_cursillo, ["class" => "form-control", "title"=>"Tipo de cursillo"]) !!}
    <br/>
    @if (Auth::check())
        @if(Auth::user()->roles->peso>=config('opciones.roles.administrador'))
            <div class="heading-caption">Zona Administrador</div>
            {!! FORM::label ('estado', 'Activo') !!} <br/>
            {!! FORM::select('activo',array('1'=>'Si','0'=>'No'), $tipos_cursillos->activo,array('class'=>'form-control')) !!}
        @endif
    @endif
</div>
