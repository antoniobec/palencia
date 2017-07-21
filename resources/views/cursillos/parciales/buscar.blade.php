{{-- Formulario de busqueda --}}
{!!FORM::model(Request::only(['cursillo','semanas','anyos','comunidad','esActivo']),['route'=>'cursillos.index','method'=>'GET','role'=>'search']) !!}
<div class="form-group">
    {!! FORM::select('comunidad', $comunidades, null,array("class"=>"form-control"))!!}
</div>
<div class="form-group">
    {!! FORM::select('anyos', array(), null,array("class"=>"form-control",'id'=>'select_anyos'))!!}
</div>
<div class="form-group">
    {!! FORM::select('semanas', array(), null,array("class"=>"form-control", 'id'=>'select_semanas'))!!}
</div>
<div class="form-group">
    {!! FORM::select('esActivo', array(''=>'Activos + No Activos','1'=>'Activos','0'=>'No Activos'),
    null,array("class"=>"form-control"))!!}
</div>
<div class="form-group">
    {!! FORM::text('cursillo',null,['class'=>'form-control','placeholder'=>'Buscar....'])!!}
</div>
<br/>
<button type="submit" class="btn btn-success btn-block"><span class='glyphicon glyphicon-search'></span></button>
{!! FORM::close() !!}
