<div class="form-group">
    <div class="heading-caption">Comunidad</div>
    {!! FORM::label ('comunidad', 'Comunidad') !!}
    {!! FORM::select('comunidad_id', $comunidades, $solicitudEnviada->comunidad_id, array('class'=>'form-control')) !!}
    <br/>
    <div class="heading-caption">Cursillo</div>
    {!! FORM::label ('cursillo', 'Cursillo') !!}
    {!! FORM::select('cursillo_id', $cursillos, $solicitudEnviada->cursillo_id, array('class'=>'form-control')) !!}
    <br/>
    {!! FORM::label ('aceptada', 'Aceptada') !!} <br/>
    {!! FORM::select('aceptada',array('1'=>'Si','0'=>'No'), $solicitudEnviada->aceptada,array('class'=>'form-control')) !!}
    <br/>

    @if (Auth::check())
        @if(Auth::user()->roles->peso>=config('opciones.roles.administrador'))
            <div class="heading-caption">Zona Administrador</div>
            {!! FORM::label ('estado', 'Activo') !!} <br/>
            {!! FORM::select('activo',array('1'=>'Si','0'=>'No'), $solicitudEnviada->activo,array('class'=>'form-control')) !!}
        @endif
    @endif
</div>