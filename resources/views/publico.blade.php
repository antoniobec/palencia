@extends ("plantillas.admin")
@section ("css")
    {!! HTML::style('css/publico/registro.css') !!}
@endsection
@section ("contenido")

    <div class="row">
        <h1>Area Publica</h1>
        @if(Session::has('mensaje'))
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <strong>¡Aviso!</strong> {!! Session::get('mensaje') !!}
            </div>
        @endif
        @if($errors->has())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <strong>Errores</strong>
                <ol>
                    @foreach ($errors->all('<p>:message</p>') as $message)
                        <li>{!! $message !!}</li>
                    @endforeach
                </ol>
            </div>
        @endif




        </div>
    </div>

    {{-- Formulario Registrarse --}}
    <div id="formularioModal">
        <div class="ventanaModal">
            <div class="headerFormularioModal">
                <span class="headerFormularioModalTitle"></span>
                <a title="Cerrar" class="closeFormModal">X</a>
            </div>
            <div class="cuerpoFormularioModal">
                <div class="scroll">
                    {!! FORM::open(array('url' => 'auth/register')) !!}

                    {!! FORM::label('fullname', 'nombre completo') !!} <br/>
                    {!! FORM::text ('fullname',"",array("class"=>"form-control")) !!} <br/>

                    {!! FORM::label('username', 'nombre usuario') !!} <br/>
                    {!! FORM::text ('name',"",array("maxlength"=>"20","class"=>"form-control")) !!} <br/>

                    {!! FORM::label ('email', 'email') !!} <br/>
                    {!! FORM::text('email',"",array("class"=>"form-control")) !!} <br/>

                    {!! FORM::label ('password', 'contraseña') !!} <br/>
                    {!! FORM::password ('password',array("class"=>"form-control")) !!} <br/>

                    {!! FORM::label ('passwordConfrmation', 'repetir contraseña') !!} <br/>
                    {!! FORM::password ('password_confirmation',array("class"=>"form-control")) !!}

                    {!! FORM::hidden ('activo', 1) !!}

                    <br/>

                    {!! FORM::submit('registrarse',array("class"=>"btn btn-success btn-block")) !!}

                    {!! FORM::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    {!! HTML::script('js/publico/modal.js') !!}
@endsection
