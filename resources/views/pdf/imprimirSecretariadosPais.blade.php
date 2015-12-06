<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Secretariados por país</title>
    {{--!! HTML::style('css/pdf.css') !!--}}
    <style>

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
            position: relative;
            width: 19cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
        }

        .text-center {

            text-align: center;
        }

        .cabecera1 {

            font-size: 25px;
            font-weight: bold;
            margin-bottom:20px;

        }

        .cabecera2 {

            font-weight: bold;
            font-size: 18px;
            margin-bottom:20px;

        }
        .cabecera3 {

            background-color: #400090;
            color: #FFFFFF;
            font-weight: bold;
            font-size: 16px;

        }


        .cabecera4 {

            background-color: #FF7A00;
            color: #FFFFFF;
            font-weight: bold;
            font-size: 16px;

        }

        .cabecera5 {

            background-color: #400090;
            color: #FFFFFF;
            font-weight: bold;
            font-size: 20px;
            padding-top:20px;
            padding-bottom:20px;

        }

        table thead, table th {
            background-color: #9d9d9d;
            color:#000000;
            font-weight: bold;
            text-align: center;
            padding-top:20px;
            padding-bottom:20px;

        }

        #logo {
            float: left;
            margin-top: 8px;
        }

        table {
            width: 100%;
            margin-bottom: 20px;

        }


        table td {
            padding: 20px;
            background: #FFFFFF;
            text-align: center;
            border-bottom: 1px solid #4a4949;
            color: #000000;

        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: left;
        }

        .td1 {

            width: 10%;

        }

        .td2 {
            width: 90%;
        }

    </style>
</head>
<body>
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class=" cabecera1 text-center">
    {{ $titulo }} {!! $pais->pais !!}<br/>
</div>

<div class=" cabecera2">
    Fecha: {{ $date }}
</div>

@if(!$comunidades->isEmpty())

    <div class="cabecera5 text-center">Secretariados</div><br/>

<table border="0" cellspacing="0" cellpadding="0">

        <thead>

        </thead>
        <tbody>

        @foreach ($comunidades as $comunidad)

            <tr>
                <td class="text-center">
                    {!! $comunidad->comunidad !!}
                </td>
            </tr>
        @endforeach

        </tbody>
</table>
@else
    <div>
        <div class="cabecera4 text-center">
            <p>¡Aviso! - No se ha encontrado ningun secretariado que listar para el país solicitado.</p>
        </div>
    </div>
@endif
</body>
</html>