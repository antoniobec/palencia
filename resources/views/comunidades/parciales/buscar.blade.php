{{-- Formulario de busqueda --}}
{!!FORM::model(Request::only(['comunidad','esPropia','secretariado','pais']),['route'=>'comunidades.index','method'=>'GET','role'=>'search']) !!}
<div class="form-group">
    {!! FORM::select('pais', $paises, null,array("class"=>"form-control"))!!}
</div>
<div class="form-group">
    {!! FORM::select('secretariado', $secretariados, null,array("class"=>"form-control"))!!}
</div>
<div class="form-group">
    {!! FORM::select('esPropia', array(''=>'Tipo Comunidad...','1'=>'Propia','0'=>'No Propia'),
    null,array("class"=>"form-control"))!!}
</div>
<div class="form-group">
    {!! FORM::text('comunidad',null,['class'=>'form-control','placeholder'=>'Comunidad....'])!!}
</div>
<button type="submit" class="btn btn-success btn-block"><span class='glyphicon glyphicon-search'></span></button>
{!! FORM::close() !!}
