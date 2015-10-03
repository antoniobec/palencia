<div class="form-group">
    <div class="heading-caption">Datos Generales</div>
    {!! FORM::label('rol', 'Nombre del Rol') !!} <br/>
    {!! FORM::text('rol', null, ["class" => "form-control", "title"=>"Nombre del Rol"]) !!}
    <br/>
    {!! FORM::label('peso', 'Peso') !!} <br/>
    {!! FORM::text('peso', null, ["class" => "form-control", "title"=>"Peso"]) !!}
    <br/>
    @if (Auth::check())
        @if(Auth::user()->roles->peso>=config('opciones.roles.administrador'))
            <div class="heading-caption">Zona Administrador</div>
            {!! FORM::label ('estado', 'Activa') !!} <br/>
            {!! FORM::select('activo',array('1'=>'Si','0'=>'No'), $roles->activo,array('class'=>'form-control')) !!}
        @endif
    @endif
</div>